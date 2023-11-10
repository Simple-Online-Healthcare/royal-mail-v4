<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Clients;

class RoyalMailShippingAuthClient
{
    /**
     * @var string
     */
    protected string $clientId;

    /**
     * @var string
     */
    protected string $clientSecret;

    /**
     * @var string|null
     */
    protected ?string $token = null;

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
     * @return RoyalMailShippingAuthClient
     */
    public function setClientId(string $clientId): RoyalMailShippingAuthClient
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
     * @return RoyalMailShippingAuthClient
     */
    public function setClientSecret(string $clientSecret): RoyalMailShippingAuthClient
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     *
     * @return RoyalMailShippingAuthClient
     */
    public function setToken(?string $token): RoyalMailShippingAuthClient
    {
        $this->token = $token;

        return $this;
    }
}
