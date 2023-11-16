<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Clients;

use GuzzleHttp\Client as HttpClient;
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
     * @return string
     *
     * @throws RequestFailedException
     */
    protected function getToken(): string
    {
        if (!$token = $this->authClient->getToken()) {
            $token = $this->refreshToken();
        }

        return $token;
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

    protected function buildClient(): void
    {
        $this->httpClient = new HttpClient([
            'http_errors' => false,
        ]);
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

        dump($httpMethod);

        dump($endpoint);

        dump([
            'Authorization' => "bearer {$this->authClient->getToken()}",
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        dump($data);

        /** @var ResponseInterface $response */
        $response = $this->httpClient->{$httpMethod}($endpoint, [
            'body' => $data ? json_encode($data) : null,
            'headers' => [
                'Authorization' => "bearer {$this->authClient->getToken()}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        dd($response);

        if ($this->responseIsError($response)) {
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                $this->authClient->setToken(null);
                $this->refreshToken();

                /** @var ResponseInterface $response */
                $response = $this->httpClient->{$httpMethod}($endpoint, [
                    'body' => $data ? json_encode($data) : null,
                    'headers' => [
                        'Authorization' . "Bearer $token",
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
     * @param ResponseInterface $response
     *
     * @return bool
     */
    protected function responseIsError(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 400 && $response->getStatusCode() <= 599;
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
     * @param object $object
     *
     * @return array
     */
    protected function serializeOne(object $object): array
    {
        return json_decode($this->serializer->serialize($object, 'json'), true);
    }

    /*****
     *
     * Begin API consumer methods
     *
     *****/

    /**
     * @return string|null
     *
     * @throws RequestFailedException
     */
    public function testToken(): ?string
    {
        $this->getToken();

        return $this->authClient->getToken();
    }

    /**
     * @param Address $address
     *
     * @return AddressResponse|object
     *
     * @throws RequestFailedException
     */
    public function createAddress(Address $address): AddressResponse
    {
        $payload = $this->serializeOne($address);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            'addresses',
            $payload,
            AddressResponse::class
        );

        return $this->deserializeOne($response, AddressResponse::class);
    }

    /**
     * @param string $addressId
     *
     * @return object|Address
     *
     * @throws RequestFailedException
     */
    public function getAddress(string $addressId): Address
    {
        $response = $this->sendRequest(
            Request::METHOD_GET,
            "addresses/$addressId",
            null,
            AddressResponse::class
        );

        return $this->deserializeOne($response, Address::class);
    }

    /**
     * @param Address $address
     *
     * @return AddressResponse|object
     *
     * @throws RequestFailedException
     */
    public function updateAddress(Address $address): AddressResponse
    {
        $payload = $this->serializeOne($address);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            "addresses/{$address->getAddressId()}",
            $payload,
            AddressResponse::class
        );

        return $this->deserializeOne($response, AddressResponse::class);
    }

    /**
     * @param string $addressId
     *
     * @return AddressResponse|object
     *
     * @throws RequestFailedException
     */
    public function deleteAddress(string $addressId): AddressResponse
    {
        $response = $this->sendRequest(
            Request::METHOD_DELETE,
            "addresses/$addressId",
            null,
            AddressResponse::class
        );

        return $this->deserializeOne($response, AddressResponse::class);
    }

    /**
     * @return array|Item[]
     *
     * @throws RequestFailedException
     */
    public function getItems(): array
    {
        $response = $this->sendRequest(
            Request::METHOD_GET,
            'items',
            null,
            ItemResponse::class
        );

        return $this->deserializeMany($response, Item::class);
    }

    /**
     * @param string $itemId
     *
     * @return object|Item
     *
     * @throws RequestFailedException
     */
    public function getItem(string $itemId): Item
    {
        $response = $this->sendRequest(
            Request::METHOD_GET,
            "items/$itemId",
            null,
            ItemResponse::class
        );

        return $this->deserializeOne($response, Item::class);
    }

    /**
     * @return array|Address[]
     *
     * @throws RequestFailedException
     */
    public function getAddresses(): array
    {
        $response = $this->sendRequest
        (Request::METHOD_GET,
            'addresses',
            null,
            AddressResponse::class
        );

        return $this->deserializeMany($response, Address::class);
    }

    /**
     * @param Item $item
     *
     * @return ItemResponse|object
     *
     * @throws RequestFailedException
     */
    public function createItem(Item $item): ItemResponse
    {
        $payload = $this->serializeOne($item);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            'items',
            $payload,
            ItemResponse::class
        );

        return $this->deserializeOne($response, ItemResponse::class);
    }

    /**
     * @param Item $item
     *
     * @return ItemResponse|object
     *
     * @throws RequestFailedException
     */
    public function updateItem(Item $item): ItemResponse
    {
        $payload = $this->serializeOne($item);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            "items/{$item->getItemId()}",
            $payload,
            ItemResponse::class
        );

        return $this->deserializeOne($response, ItemResponse::class);
    }

    /**
     * @param string $itemId
     *
     * @return ItemResponse|object
     *
     * @throws RequestFailedException
     */
    public function deleteItem(string $itemId): ItemResponse
    {
        $response = $this->sendRequest(
            Request::METHOD_DELETE,
            "items/$itemId",
            null,
            ItemResponse::class
        );

        return $this->deserializeOne($response, ItemResponse::class);
    }

    /**
     * @return array|Packaging[]
     *
     * @throws RequestFailedException
     */
    public function getPackagings(): array
    {
        $response = $this->sendRequest(
            Request::METHOD_GET,
            'packaging',
            null,
            PackagingResponse::class
        );

        return $this->deserializeMany($response, Packaging::class);
    }

    /**
     * @param string $packagingId
     *
     * @return object|Packaging
     *
     * @throws RequestFailedException
     */
    public function getPackaging(string $packagingId): Packaging
    {
        $response = $this->sendRequest(
            Request::METHOD_GET,
            "packaging/$packagingId",
            null,
            PackagingResponse::class
        );

        return $this->deserializeOne($response, Packaging::class);
    }

    /**
     * @param Packaging $packaging
     *
     * @return PackagingResponse|object
     *
     * @throws RequestFailedException
     */
    public function createPackaging(Packaging $packaging): PackagingResponse
    {
        $payload = $this->serializeOne($packaging);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            'packaging',
            $payload,
            PackagingResponse::class
        );

        return $this->deserializeOne($response, PackagingResponse::class);
    }

    /**
     * @param Packaging $packaging
     *
     * @return PackagingResponse|object
     *
     * @throws RequestFailedException
     */
    public function updatePackaging(Packaging $packaging): PackagingResponse
    {
        $payload = $this->serializeOne($packaging);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            "packaging/{$packaging->getPackagingId()}",
            $payload, PackagingResponse::class
        );

        return $this->deserializeOne($response, PackagingResponse::class);
    }

    /**
     * @param string $packagingId
     *
     * @return PackagingResponse|object
     *
     * @throws RequestFailedException
     */
    public function deletePackaging(string $packagingId): PackagingResponse
    {
        $response = $this->sendRequest(
            Request::METHOD_DELETE,
            "packaging/$packagingId",
            null,
            PackagingResponse::class
        );

        return $this->deserializeOne($response, PackagingResponse::class);
    }

    /**
     * @param ManifestRequest $manifestRequest
     *
     * @return ManifestResponse|object
     *
     * @throws RequestFailedException
     */
    public function manifestAll(ManifestRequest $manifestRequest): ManifestResponse
    {
        $payload = $this->serializeOne($manifestRequest);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            'manifests',
            $payload,
            ManifestResponse::class
        );

        return $this->deserializeOne($response, ManifestResponse::class);
    }

    /**
     * @param ManifestCarrierCodesRequest $manifestCarrierCodesRequest
     *
     * @return ManifestResponse|object
     *
     * @throws RequestFailedException
     */
    public function manifestByCarrierCodes(ManifestCarrierCodesRequest $manifestCarrierCodesRequest): ManifestResponse
    {
        $payload = $this->serializeOne($manifestCarrierCodesRequest);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            'manifests/bycarrier',
            $payload,
            ManifestResponse::class
        );

        return $this->deserializeOne($response, ManifestResponse::class);
    }

    /**
     * @param ManifestServiceCodesRequest $manifestServiceCodesRequest
     *
     * @return ManifestResponse|object
     *
     * @throws RequestFailedException
     */
    public function manifestByServiceCodes(ManifestServiceCodesRequest $manifestServiceCodesRequest): ManifestResponse
    {
        $payload = $this->serializeOne($manifestServiceCodesRequest);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            'manifests/byservice',
            $payload,
            ManifestResponse::class
        );

        return $this->deserializeOne($response, ManifestResponse::class);
    }

    /**
     * @param Shipment $shipment
     *
     * @return object|ShipmentCreateResponse
     *
     * @throws RequestFailedException
     */
    public function createShipment(Shipment $shipment): ShipmentCreateResponse
    {
        $data = [
            "ShipmentInformation" => [
                "ContentType" => "NDX",
                "ServiceCode" => "SD1",
                "DescriptionOfGoods" => "Pharmacy items.",
                "ShipmentDate" => "2023-11-16",
                "WeightUnitOfMeasure" => "KG",
                "DimensionsUnitOfMeasure" => "CM",
            ],
            "Shipper" => [
                "ShippingAccountId" => "3bddc02b-3b51-4605-ba6c-5e64dcd3a43f",
                "ShippingLocationId" => "9557b686-104f-4d39-b538-f4fce4986f22",
                "Reference1" => "TestOrder"
            ],
            "Destination" => [
                "Address" => [
                    "ContactName" => "John Doe",
                    "ContactEmail" => "john.doe@example.com",
                    "ContactPhone" => "01234567890",
                    "Line1" => "185 Farringdon Road",
                    "Town" => "London",
                    "Postcode" => "EC1A 1AA",
                    "CountryCode" => "GB"
                ],
            ],

            "Packages" => [
                "PackageType" => "Parcel",
                "DeclaredWeight" => "1.5",
                "Dimensions" => [
                    "Length" => "40.0",
                    "Width" => "30.0",
                    "Height" => "20.0"
                ],
            ]
        ];

        $orderedPackages = array($data["Packages"]);
        $data["Packages"] = $orderedPackages;

//        $payload = $this->serializeOne($shipment);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            $this->buildEndpoint(self::BASE_URL, 'shipments/rm'),
            $data,
            ShipmentCreateResponse::class
        );

        return $this->deserializeOne($response, ShipmentCreateResponse::class);
    }

    /**
     * @param PrintDocumentRequest $printDocumentRequest
     * @param string $shipmentId
     *
     * @return PrintDocumentResponse|object
     *
     * @throws RequestFailedException
     */
    public function printShipmentDocument(PrintDocumentRequest $printDocumentRequest, string $shipmentId): PrintDocumentResponse
    {
        $payload = $this->serializeOne($printDocumentRequest);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            "shipments/$shipmentId/printDocument",
            $payload,
            PrintDocumentResponse::class
        );

        return $this->deserializeOne($response, PrintDocumentResponse::class);
    }

    /**
     * @param PrintLabelRequest $printLabelRequest
     * @param string $shipmentId
     *
     * @return PrintLabelResponse|object
     *
     * @throws RequestFailedException
     */
    public function printShipmentLabel(PrintLabelRequest $printLabelRequest, string $shipmentId): PrintLabelResponse
    {
        $payload = $this->serializeOne($printLabelRequest);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            "shipments/$shipmentId/printLabel",
            $payload,
            PrintLabelResponse::class
        );

        return $this->deserializeOne($response, PrintLabelResponse::class);
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

    /**
     * @param ShipmentCancelRequest[] $shipmentCancelRequests
     *
     * @return ShipmentsCancelResponse|object
     *
     * @throws RequestFailedException
     */
    public function cancelShipments(array $shipmentCancelRequests): ShipmentsCancelResponse
    {
        $payload = $this->serializeMany($shipmentCancelRequests);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            'shipments/cancel',
            $payload,
            ShipmentsCancelResponse::class
        );

        return $this->deserializeOne($response, ShipmentsCancelResponse::class);
    }

    /**
     * @param ShipmentDeferRequest $shipmentDeferRequest
     *
     * @return ShipmentsDeferResponse|object
     *
     * @throws RequestFailedException
     */
    public function deferShipment(ShipmentDeferRequest $shipmentDeferRequest): ShipmentsDeferResponse
    {
        $payload = $this->serializeOne($shipmentDeferRequest);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            'shipments/defer',
            $payload,
            ShipmentsDeferResponse::class
        );

        return $this->deserializeOne($response, ShipmentsDeferResponse::class);
    }

    /**
     * @param ShipmentDeferRequest[] $shipmentDeferRequests
     *
     * @return ShipmentsDeferResponse|object
     *
     * @throws RequestFailedException
     */
    public function deferShipments(array $shipmentDeferRequests): ShipmentsDeferResponse
    {
        $payload = $this->serializeMany($shipmentDeferRequests);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            'shipments/defer',
            $payload,
            ShipmentsDeferResponse::class
        );

        return $this->deserializeOne($response, ShipmentsDeferResponse::class);
    }

    /**
     * @param ShipmentHoldRequest $shipmentHoldRequest
     *
     * @return ShipmentsHoldResponse|object
     *
     * @throws RequestFailedException
     */
    public function holdShipment(ShipmentHoldRequest $shipmentHoldRequest): ShipmentsHoldResponse
    {
        $payload = $this->serializeOne($shipmentHoldRequest);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            'shipments/hold',
            $payload,
            ShipmentsHoldResponse::class
        );

        return $this->deserializeOne($response, ShipmentsHoldResponse::class);
    }

    /**
     * @param ShipmentHoldRequest[] $shipmentHoldRequests
     *
     * @return ShipmentsHoldResponse|object
     *
     * @throws RequestFailedException
     */
    public function holdShipments(array $shipmentHoldRequests): ShipmentsHoldResponse
    {
        $payload = $this->serializeMany($shipmentHoldRequests);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            'shipments/hold',
            $payload,
            ShipmentsHoldResponse::class
        );

        return $this->deserializeOne($response, ShipmentsHoldResponse::class);
    }

    /**
     * @param ShipmentsReleaseRequest $shipmentsReleaseRequest
     *
     * @return ShipmentsReleaseResponse|object
     *
     * @throws RequestFailedException
     */
    public function releaseShipments(ShipmentsReleaseRequest $shipmentsReleaseRequest): ShipmentsReleaseResponse
    {
        $payload = $this->serializeOne($shipmentsReleaseRequest);

        $response = $this->sendRequest(
            Request::METHOD_PUT,
            'shipments/release',
            $payload,
            ShipmentsReleaseResponse::class
        );

        return $this->deserializeOne($response, ShipmentsReleaseResponse::class);
    }

    /**
     * @param ServiceAvailabilityShipment $shipment
     *
     * @return ServiceAvailabilityResponse|object
     *
     * @throws RequestFailedException
     */
    public function getShipmentServiceAvailability(ServiceAvailabilityShipment $shipment): ServiceAvailabilityResponse
    {
        $payload = $this->serializeOne($shipment);

        $response = $this->sendRequest(
            Request::METHOD_POST,
            'shipments/serviceAvailability',
            $payload,
            ServiceAvailabilityResponse::class
        );

        return $this->deserializeOne($response, ServiceAvailabilityResponse::class);
    }
}
