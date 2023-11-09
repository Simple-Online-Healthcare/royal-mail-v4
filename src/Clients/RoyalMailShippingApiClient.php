<?php

namespace SimpleOnlineHealthcare\RoyalMail\Clients;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;
use SimpleOnlineHealthcare\RoyalMail\Exceptions\RequestFailedException;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\Address;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\AddressResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Shipment;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\Item;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ItemResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ManifestCarrierCodesRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ManifestRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ManifestResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ManifestServiceCodesRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\Packaging;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\PackagingResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\PrintDocumentRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\PrintDocumentResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\PrintLabelRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\PrintLabelResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability\Shipment as ServiceAvailabilityShipment;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailabilityResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentCancelRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentCreateResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentDeferRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentHoldRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentsCancelResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentsDeferResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentsHoldResponse;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentsReleaseRequest;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentsReleaseResponse;

class RoyalMailShippingApiClient
{
    const BASE_URL = 'https://api.royalmail.net/shipping/v3/';

    /**
     * @var RoyalMailShippingAuthClient
     */
    protected $authClient;

    /**
     * @var string|null
     */
    protected $cachePrefix;

    /**
     * @var int|null
     */
    protected $cacheTtl;

    /**
     * @var CacheRepository
     */
    protected $cacheRepository;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param SerializerInterface         $serializer
     * @param RoyalMailShippingAuthClient $authClient
     * @param CacheRepository             $cacheRepository
     * @param string|null                 $cachePrefix
     * @param int|null                    $cacheTtl
     */
    public function __construct(SerializerInterface $serializer, RoyalMailShippingAuthClient $authClient, CacheRepository $cacheRepository, ?string $cachePrefix, ?int $cacheTtl)
    {
        $this->serializer = $serializer;
        $this->authClient = $authClient;
        $this->cachePrefix = $cachePrefix;
        $this->cacheTtl = $cacheTtl;
        $this->cacheRepository = $cacheRepository;

        $this->buildClient();
        $this->initialiseTokenFromCache();
    }

    protected function buildClient()
    {
        $this->httpClient = new HttpClient([
            'base_uri' => self::BASE_URL,
            'http_errors' => false,
        ]);
    }

    /**
     * @param string      $method
     * @param string      $endpoint
     * @param array|null  $data
     * @param string|null $responseModel
     * @param array|null  $headers
     * @param bool        $refreshToken
     *
     * @throws RequestFailedException
     *
     * @return array
     */
    protected function sendRequest(string $method, string $endpoint, ?array $data = null, ?string $responseModel = null, ?array $headers = null, bool $refreshToken = false)
    {
        $headers = $headers ?? [
            'X-IBM-Client-Id' => $this->authClient->getClientId(),
            'X-RMG-Auth-Token' => $this->getToken(),
        ];

        /** @var ResponseInterface $response */
        $response = $this->httpClient->{$method}($endpoint, [
            'body' => $data ? json_encode($data) : null,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ] + $headers,
        ]);

        if ($this->responseIsError($response)) {
            if (!$refreshToken && $response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                $this->authClient->setToken(null);

                return $this->sendRequest($method, $endpoint, $data, null, $headers, true);
            }

            $exception = new RequestFailedException($response);

            if ($responseModel) {
                $body = (string) $response->getBody();
                $body = json_decode($body, true);

                $exception->setResponseModel($this->deserializeOne($body, $responseModel));
            }

            throw $exception;
        }

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return bool
     */
    protected function responseIsError(ResponseInterface $response)
    {
        return $response->getStatusCode() >= 400 && $response->getStatusCode() <= 599;
    }

    protected function initialiseTokenFromCache()
    {
        if ($token = $this->cacheRepository->get($this->getCacheKey())) {
            $this->authClient->setToken($token);
        }
    }

    /**
     * @return string
     */
    public function getToken()
    {
        if (!$token = $this->authClient->getToken()) {
            $token = $this->refreshToken();
        }

        return $token;
    }

    /**
     * @return string
     */
    public function refreshToken()
    {
        $headers = [
            'X-IBM-Client-Id' => $this->authClient->getClientId(),
            'X-IBM-Client-Secret' => $this->authClient->getClientSecret(),
            'X-RMG-Security-Username' => $this->authClient->getUsername(),
            'X-RMG-Security-Password' => $this->authClient->getPassword(),
        ];

        $response = $this->sendRequest(Request::METHOD_POST, 'token', null, null, $headers, false);

        $this->authClient->setToken($response['token']);

        if ($this->cacheTtl) {
            $this->cacheRepository->put($this->getCacheKey(), $this->authClient->getToken(), $this->cacheTtl);
        }

        return $this->authClient->getToken();
    }

    /**
     * @return string
     */
    protected function getCacheKey()
    {
        $key = 'royal-mail-auth-token';

        if ($this->cachePrefix) {
            $key = $this->cachePrefix . '-' . $key;
        }

        return $key;
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
     * @param array  $item
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

    /**
     * @param array  $items
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

    /*****
     *
     * Begin API consumer methods
     *
     *****/

    /**
     * @throws RequestFailedException
     *
     * @return array|Address[]
     */
    public function getAddresses(): array
    {
        $response = $this->sendRequest(Request::METHOD_GET, 'addresses', null, AddressResponse::class);

        return $this->deserializeMany($response, Address::class);
    }

    /**
     * @param string $addressId
     *
     * @throws RequestFailedException
     *
     * @return object|Address
     */
    public function getAddress(string $addressId): Address
    {
        $response = $this->sendRequest(Request::METHOD_GET, "addresses/{$addressId}", null, AddressResponse::class);

        return $this->deserializeOne($response, Address::class);
    }

    /**
     * @param Address $address
     *
     * @throws RequestFailedException
     *
     * @return AddressResponse|object
     */
    public function createAddress(Address $address): AddressResponse
    {
        $payload = $this->serializeOne($address);

        $response = $this->sendRequest(Request::METHOD_POST, 'addresses', $payload, AddressResponse::class);

        return $this->deserializeOne($response, AddressResponse::class);
    }

    /**
     * @param Address $address
     *
     * @throws RequestFailedException
     *
     * @return AddressResponse|object
     */
    public function updateAddress(Address $address): AddressResponse
    {
        $payload = $this->serializeOne($address);

        $response = $this->sendRequest(Request::METHOD_PUT, "addresses/{$address->getAddressId()}", $payload, AddressResponse::class);

        return $this->deserializeOne($response, AddressResponse::class);
    }

    /**
     * @param string $addressId
     *
     * @throws RequestFailedException
     *
     * @return AddressResponse|object
     */
    public function deleteAddress(string $addressId): AddressResponse
    {
        $response = $this->sendRequest(Request::METHOD_DELETE, "addresses/{$addressId}", null, AddressResponse::class);

        return $this->deserializeOne($response, AddressResponse::class);
    }

    /**
     * @throws RequestFailedException
     *
     * @return array|Item[]
     */
    public function getItems(): array
    {
        $response = $this->sendRequest(Request::METHOD_GET, 'items', null, ItemResponse::class);

        return $this->deserializeMany($response, Item::class);
    }

    /**
     * @param string $itemId
     *
     * @throws RequestFailedException
     *
     * @return object|Item
     */
    public function getItem(string $itemId): Item
    {
        $response = $this->sendRequest(Request::METHOD_GET, "items/{$itemId}", null, ItemResponse::class);

        return $this->deserializeOne($response, Item::class);
    }

    /**
     * @param Item $item
     *
     * @throws RequestFailedException
     *
     * @return ItemResponse|object
     */
    public function createItem(Item $item): ItemResponse
    {
        $payload = $this->serializeOne($item);

        $response = $this->sendRequest(Request::METHOD_POST, 'items', $payload, ItemResponse::class);

        return $this->deserializeOne($response, ItemResponse::class);
    }

    /**
     * @param Item $item
     *
     * @throws RequestFailedException
     *
     * @return ItemResponse|object
     */
    public function updateItem(Item $item): ItemResponse
    {
        $payload = $this->serializeOne($item);

        $response = $this->sendRequest(Request::METHOD_PUT, "items/{$item->getItemId()}", $payload, ItemResponse::class);

        return $this->deserializeOne($response, ItemResponse::class);
    }

    /**
     * @param string $itemId
     *
     * @throws RequestFailedException
     *
     * @return ItemResponse|object
     */
    public function deleteItem(string $itemId): ItemResponse
    {
        $response = $this->sendRequest(Request::METHOD_DELETE, "items/{$itemId}", null, ItemResponse::class);

        return $this->deserializeOne($response, ItemResponse::class);
    }

    /**
     * @throws RequestFailedException
     *
     * @return array|Packaging[]
     */
    public function getPackagings(): array
    {
        $response = $this->sendRequest(Request::METHOD_GET, 'packaging', null, PackagingResponse::class);

        return $this->deserializeMany($response, Packaging::class);
    }

    /**
     * @param string $packagingId
     *
     * @throws RequestFailedException
     *
     * @return object|Packaging
     */
    public function getPackaging(string $packagingId): Packaging
    {
        $response = $this->sendRequest(Request::METHOD_GET, "packaging/{$packagingId}", null, PackagingResponse::class);

        return $this->deserializeOne($response, Packaging::class);
    }

    /**
     * @param Packaging $packaging
     *
     * @throws RequestFailedException
     *
     * @return PackagingResponse|object
     */
    public function createPackaging(Packaging $packaging): PackagingResponse
    {
        $payload = $this->serializeOne($packaging);

        $response = $this->sendRequest(Request::METHOD_POST, 'packaging', $payload, PackagingResponse::class);

        return $this->deserializeOne($response, PackagingResponse::class);
    }

    /**
     * @param Packaging $packaging
     *
     * @throws RequestFailedException
     *
     * @return PackagingResponse|object
     */
    public function updatePackaging(Packaging $packaging): PackagingResponse
    {
        $payload = $this->serializeOne($packaging);

        $response = $this->sendRequest(Request::METHOD_PUT, "packaging/{$packaging->getPackagingId()}", $payload, PackagingResponse::class);

        return $this->deserializeOne($response, PackagingResponse::class);
    }

    /**
     * @param string $packagingId
     *
     * @throws RequestFailedException
     *
     * @return PackagingResponse|object
     */
    public function deletePackaging(string $packagingId): PackagingResponse
    {
        $response = $this->sendRequest(Request::METHOD_DELETE, "packaging/{$packagingId}", null, PackagingResponse::class);

        return $this->deserializeOne($response, PackagingResponse::class);
    }

    /**
     * @param ManifestRequest $manifestRequest
     *
     * @throws RequestFailedException
     *
     * @return ManifestResponse|object
     */
    public function manifestAll(ManifestRequest $manifestRequest): ManifestResponse
    {
        $payload = $this->serializeOne($manifestRequest);

        $response = $this->sendRequest(Request::METHOD_POST, 'manifests', $payload, ManifestResponse::class);

        return $this->deserializeOne($response, ManifestResponse::class);
    }

    /**
     * @param ManifestCarrierCodesRequest $manifestCarrierCodesRequest
     *
     * @throws RequestFailedException
     *
     * @return ManifestResponse|object
     */
    public function manifestByCarrierCodes(ManifestCarrierCodesRequest $manifestCarrierCodesRequest): ManifestResponse
    {
        $payload = $this->serializeOne($manifestCarrierCodesRequest);

        $response = $this->sendRequest(Request::METHOD_POST, 'manifests/bycarrier', $payload, ManifestResponse::class);

        return $this->deserializeOne($response, ManifestResponse::class);
    }

    /**
     * @param ManifestServiceCodesRequest $manifestServiceCodesRequest
     *
     * @throws RequestFailedException
     *
     * @return ManifestResponse|object
     */
    public function manifestByServiceCodes(ManifestServiceCodesRequest $manifestServiceCodesRequest): ManifestResponse
    {
        $payload = $this->serializeOne($manifestServiceCodesRequest);

        $response = $this->sendRequest(Request::METHOD_POST, 'manifests/byservice', $payload, ManifestResponse::class);

        return $this->deserializeOne($response, ManifestResponse::class);
    }

    /**
     * @param Shipment $shipment
     *
     * @throws RequestFailedException
     *
     * @return object|ShipmentCreateResponse
     */
    public function createShipment(Shipment $shipment): ShipmentCreateResponse
    {
        $payload = $this->serializeOne($shipment);

        $response = $this->sendRequest(Request::METHOD_POST, 'shipments', $payload, ShipmentCreateResponse::class);

        return $this->deserializeOne($response, ShipmentCreateResponse::class);
    }

    /**
     * @param PrintDocumentRequest $printDocumentRequest
     * @param string               $shipmentId
     *
     * @throws RequestFailedException
     *
     * @return PrintDocumentResponse|object
     */
    public function printShipmentDocument(PrintDocumentRequest $printDocumentRequest, string $shipmentId): PrintDocumentResponse
    {
        $payload = $this->serializeOne($printDocumentRequest);

        $response = $this->sendRequest(Request::METHOD_PUT, "shipments/$shipmentId/printDocument", $payload, PrintDocumentResponse::class);

        return $this->deserializeOne($response, PrintDocumentResponse::class);
    }

    /**
     * @param PrintLabelRequest $printLabelRequest
     * @param string            $shipmentId
     *
     * @throws RequestFailedException
     *
     * @return PrintLabelResponse|object
     */
    public function printShipmentLabel(PrintLabelRequest $printLabelRequest, string $shipmentId): PrintLabelResponse
    {
        $payload = $this->serializeOne($printLabelRequest);

        $response = $this->sendRequest(Request::METHOD_PUT, "shipments/$shipmentId/printLabel", $payload, PrintLabelResponse::class);

        return $this->deserializeOne($response, PrintLabelResponse::class);
    }

    /**
     * @param ShipmentCancelRequest $shipmentCancelRequest
     *
     * @throws RequestFailedException
     *
     * @return ShipmentsCancelResponse|object
     */
    public function cancelShipment(ShipmentCancelRequest $shipmentCancelRequest): ShipmentsCancelResponse
    {
        $payload = $this->serializeOne($shipmentCancelRequest);

        $response = $this->sendRequest(Request::METHOD_PUT, 'shipments/cancel', $payload, ShipmentsCancelResponse::class);

        return $this->deserializeOne($response, ShipmentsCancelResponse::class);
    }

    /**
     * @param ShipmentCancelRequest[] $shipmentCancelRequests
     *
     * @throws RequestFailedException
     *
     * @return ShipmentsCancelResponse|object
     */
    public function cancelShipments(array $shipmentCancelRequests): ShipmentsCancelResponse
    {
        $payload = $this->serializeMany($shipmentCancelRequests);

        $response = $this->sendRequest(Request::METHOD_PUT, 'shipments/cancel', $payload, ShipmentsCancelResponse::class);

        return $this->deserializeOne($response, ShipmentsCancelResponse::class);
    }

    /**
     * @param ShipmentDeferRequest $shipmentDeferRequest
     *
     * @throws RequestFailedException
     *
     * @return ShipmentsDeferResponse|object
     */
    public function deferShipment(ShipmentDeferRequest $shipmentDeferRequest): ShipmentsDeferResponse
    {
        $payload = $this->serializeOne($shipmentDeferRequest);

        $response = $this->sendRequest(Request::METHOD_PUT, 'shipments/defer', $payload, ShipmentsDeferResponse::class);

        return $this->deserializeOne($response, ShipmentsDeferResponse::class);
    }

    /**
     * @param ShipmentDeferRequest[] $shipmentDeferRequests
     *
     * @throws RequestFailedException
     *
     * @return ShipmentsDeferResponse|object
     */
    public function deferShipments(array $shipmentDeferRequests): ShipmentsDeferResponse
    {
        $payload = $this->serializeMany($shipmentDeferRequests);

        $response = $this->sendRequest(Request::METHOD_PUT, 'shipments/defer', $payload, ShipmentsDeferResponse::class);

        return $this->deserializeOne($response, ShipmentsDeferResponse::class);
    }

    /**
     * @param ShipmentHoldRequest $shipmentHoldRequest
     *
     * @throws RequestFailedException
     *
     * @return ShipmentsHoldResponse|object
     */
    public function holdShipment(ShipmentHoldRequest $shipmentHoldRequest): ShipmentsHoldResponse
    {
        $payload = $this->serializeOne($shipmentHoldRequest);

        $response = $this->sendRequest(Request::METHOD_PUT, 'shipments/hold', $payload, ShipmentsHoldResponse::class);

        return $this->deserializeOne($response, ShipmentsHoldResponse::class);
    }

    /**
     * @param ShipmentHoldRequest[] $shipmentHoldRequests
     *
     * @throws RequestFailedException
     *
     * @return ShipmentsHoldResponse|object
     */
    public function holdShipments(array $shipmentHoldRequests): ShipmentsHoldResponse
    {
        $payload = $this->serializeMany($shipmentHoldRequests);

        $response = $this->sendRequest(Request::METHOD_PUT, 'shipments/hold', $payload, ShipmentsHoldResponse::class);

        return $this->deserializeOne($response, ShipmentsHoldResponse::class);
    }

    /**
     * @param ShipmentsReleaseRequest $shipmentsReleaseRequest
     *
     * @throws RequestFailedException
     *
     * @return ShipmentsReleaseResponse|object
     */
    public function releaseShipments(ShipmentsReleaseRequest $shipmentsReleaseRequest): ShipmentsReleaseResponse
    {
        $payload = $this->serializeOne($shipmentsReleaseRequest);

        $response = $this->sendRequest(Request::METHOD_PUT, 'shipments/release', $payload, ShipmentsReleaseResponse::class);

        return $this->deserializeOne($response, ShipmentsReleaseResponse::class);
    }

    /**
     * @param ServiceAvailabilityShipment $shipment
     *
     * @throws RequestFailedException
     *
     * @return ServiceAvailabilityResponse|object
     */
    public function getShipmentServiceAvailability(ServiceAvailabilityShipment $shipment): ServiceAvailabilityResponse
    {
        $payload = $this->serializeOne($shipment);

        $response = $this->sendRequest(Request::METHOD_POST, 'shipments/serviceAvailability', $payload, ServiceAvailabilityResponse::class);

        return $this->deserializeOne($response, ServiceAvailabilityResponse::class);
    }
}
