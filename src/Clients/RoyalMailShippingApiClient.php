<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Clients;

use GuzzleHttp\Client as HttpClient;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;
use SimpleOnlineHealthcare\RoyalMail\Exceptions\RequestFailedException;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Shipment;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentCancelRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentCreateResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentsCancelResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RoyalMailShippingApiClient
{
    protected const AUTH_URL = 'https://authentication.proshipping.net/connect/token';
    protected const BASE_URL = 'https://api.proshipping.net/v4/';

    /**
     * @var RoyalMailShippingAuthClient
     */
    protected RoyalMailShippingAuthClient $authClient;

    /**
     * @var HttpClient
     */
    protected HttpClient $httpClient;

    /**
     * @var SerializerInterface
     */
    protected SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     * @param RoyalMailShippingAuthClient $authClient
     */
    public function __construct(
        SerializerInterface         $serializer,
        RoyalMailShippingAuthClient $authClient
    )
    {
        $this->serializer = $serializer;
        $this->authClient = $authClient;

        $this->buildClient();
    }

    /*****
     *
     * Begin API utility methods
     *
     *****/

    protected function buildClient(): void
    {
        $this->httpClient = new HttpClient([
            'http_errors' => false,
        ]);
    }

    /**
     * @return string
     *
     * @throws RequestFailedException
     */
    protected function refreshToken(): string
    {
        $response = $this->sendAuthRequest();

        $this->authClient->setToken($response['access_token']);

        return $this->authClient->getToken();
    }

    /**
     * @return array
     *
     * @throws RequestFailedException
     */
    protected function sendAuthRequest(): array
    {
        $response = $this->httpClient->post(self::AUTH_URL, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->authClient->getClientId(),
                'client_secret' => $this->authClient->getClientSecret(),
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ]);

        if ($this->responseIsError($response)) {
            throw new RequestFailedException($response);
        }

        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return bool
     */
    protected function responseIsError(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 400 && $response->getStatusCode() <= 599;
    }

    /**
     * @param object $object
     *
     * @return array
     */
    protected function serializeOne(object $object): array
    {
        return json_decode($this->serializer->serialize($object, 'json'), true);
    }

    /**
     * @param string $httpMethod
     * @param string $endpoint
     * @param array|null $data
     * @param string|null $responseModel
     *
     * @return array
     *
     * @throws RequestFailedException
     */
    protected function sendRequest(
        string  $httpMethod,
        string  $endpoint,
        ?array  $data = null,
        ?string $responseModel = null
    ): array
    {
        if (!$this->authClient->getToken()) {
            $this->refreshToken();
        }

        /** @var ResponseInterface $response */
        $response = $this->httpClient->{$httpMethod}($endpoint, [
            'body' => $data ? json_encode($data) : null,
            'headers' => [
                'Authorization' => "bearer {$this->authClient->getToken()}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        if ($this->responseIsError($response)) {
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                $this->authClient->setToken(null);
                $this->refreshToken();

                /** @var ResponseInterface $response */
                $response = $this->httpClient->{$httpMethod}($endpoint, [
                    'body' => $data ? json_encode($data) : null,
                    'headers' => [
                        'Authorization' . "Bearer $this->authClient->getToken()",
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                ]);
            } else {
                $exception = new RequestFailedException($response);

                if ($responseModel) {
                    $body = (string)$response->getBody();
                    $body = json_decode($body, true);

                    $exception->setResponseModel($this->deserializeOne($body, $responseModel));
                }

                throw $exception;
            }
        }

        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @param array $item
     * @param string $targetClass
     *
     * @return object
     */
    protected function deserializeOne(array $item, string $targetClass): object
    {
        return $this->serializer->deserialize(json_encode($item), $targetClass, 'json');
    }

    /**
     * @param array $items
     * @param string $targetClass
     *
     * @return array
     */
    protected function deserializeMany(array $items, string $targetClass): array
    {
        $out = [];

        foreach ($items as $item) {
            $out[] = $this->deserializeOne($item, $targetClass);
        }

        return $out;
    }

    /**
     * @param string $base
     * @param string $method
     *
     * @return string
     */
    protected function buildEndpoint(string $base, string $method): string
    {
        return "$base$method";
    }

    /**
     * @param array $items
     *
     * @return array
     */
    protected function serializeMany(array $items): array
    {
        $out = [];

        foreach ($items as $item) {
            $out[] = $this->serializeOne($item);
        }

        return $out;
    }

    /*****
     *
     * Begin API consumer methods
     *
     *****/

    /**
     * @param Shipment $shipment
     *
     * @return object|ShipmentCreateResponse
     *
     * @throws RequestFailedException
     */
    public function createShipment(Shipment $shipment): ShipmentCreateResponse
    {
        $payload = $this->serializeOne($shipment);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            $this->buildEndpoint(self::BASE_URL, 'shipments/rm'),
            $payload,
            ShipmentCreateResponse::class
        );

        /** @var ShipmentCreateResponse $shipmentCreateResponse */
        return $this->deserializeOne($response, ShipmentCreateResponse::class);
    }

    /**
     * @param ShipmentCancelRequest $shipmentCancelRequest
     *
     * @return ShipmentsCancelResponse|object
     *
     * @throws RequestFailedException
     */
    public function cancelShipment(ShipmentCancelRequest $shipmentCancelRequest): ShipmentsCancelResponse
    {
        $payload = $this->serializeOne($shipmentCancelRequest);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            'shipments/cancel',
            $payload,
            ShipmentsCancelResponse::class
        );

        return $this->deserializeOne($response, ShipmentsCancelResponse::class);
    }
}
