<?php

namespace SimpleOnlineHealthcare\RoyalMail\Clients;

class RoyalMailTrackingAuthClient
{
    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct(string $clientId, string $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     *
     * @return RoyalMailTrackingAuthClient
     */
    public function setClientId(string $clientId): RoyalMailTrackingAuthClient
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     *
     * @return RoyalMailTrackingAuthClient
     */
    public function setClientSecret(string $clientSecret): RoyalMailTrackingAuthClient
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }
}
