<?php

namespace SimpleOnlineHealthcare\RoyalMail\Clients;

use GuzzleHttp\Client as HttpClient;
use JMS\Serializer\SerializerInterface;

class RoyalMailTrackingApiClient
{
    const BASE_URL = 'https://api.royalmail.net/';

    /**
     * @var RoyalMailTrackingAuthClient
     */
    protected $authClient;

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
     * @param RoyalMailTrackingAuthClient $authClient
     */
    public function __construct(SerializerInterface $serializer, RoyalMailTrackingAuthClient $authClient)
    {
        $this->serializer = $serializer;
        $this->authClient = $authClient;

        $this->buildClient();
    }

    protected function buildClient()
    {
        $this->httpClient = new HttpClient([
            'base_uri' => self::BASE_URL,
            'http_errors' => false,
        ]);
    }
}
