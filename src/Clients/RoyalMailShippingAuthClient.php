<?php

namespace SimpleOnlineHealthcare\RoyalMail\Clients;

class RoyalMailShippingAuthClient
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
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string|null
     */
    protected $token = null;

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $username
     * @param string $password
     */
    public function __construct(string $clientId, string $clientSecret, string $username, string $password)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->username = $username;
        $this->password = $password;
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
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return RoyalMailShippingAuthClient
     */
    public function setUsername(string $username): RoyalMailShippingAuthClient
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return RoyalMailShippingAuthClient
     */
    public function setPassword(string $password): RoyalMailShippingAuthClient
    {
        $this->password = $password;

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
