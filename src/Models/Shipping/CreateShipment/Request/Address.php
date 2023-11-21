<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Request;

class Address
{
    /**
     * @var string
     */
    protected string $contactName;

    /**
     * @var string
     */
    protected string $contactEmail;

    /**
     * @var string
     */
    protected string $contactPhone;

    /**
     * @var string
     */
    protected string $line1;

    /**
     * @var string
     */
    protected string $line2;

    /**
     * @var string
     */
    protected string $line3;

    /**
     * @var string
     */
    protected string $town;

    /**
     * @var string
     */
    protected string $postcode;

    /**
     * @var string
     */
    protected string $countryCode;

    /**
     * @return string
     */
    public function getContactName(): string
    {
        return $this->contactName;
    }

    /**
     * @param string $contactName
     * @return $this
     */
    public function setContactName(string $contactName): Address
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * @return string
     */
    public function getContactEmail(): string
    {
        return $this->contactEmail;
    }

    /**
     * @param string $contactEmail
     *
     * @return $this
     */
    public function setContactEmail(string $contactEmail): Address
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getContactPhone(): string
    {
        return $this->contactPhone;
    }

    /**
     * @param string $contactPhone
     *
     * @return $this
     */
    public function setContactPhone(string $contactPhone): Address
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }

    /**
     * @return string
     */
    public function getLine1(): string
    {
        return $this->line1;
    }

    /**
     * @param string $line1
     *
     * @return $this
     */
    public function setLine1(string $line1): Address
    {
        $this->line1 = $line1;

        return $this;
    }

    /**
     * @return string
     */
    public function getLine2(): string
    {
        return $this->line2;
    }

    /**
     * @param string $line2
     *
     * @return $this
     */
    public function setLine2(string $line2): Address
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * @return string
     */
    public function getLine3(): string
    {
        return $this->line3;
    }

    /**
     * @param string $line3
     *
     * @return $this
     */
    public function setLine3(string $line3): Address
    {
        $this->line3 = $line3;

        return $this;
    }

    /**
     * @return string
     */
    public function getTown(): string
    {
        return $this->town;
    }

    /**
     * @param string $town
     *
     * @return $this
     */
    public function setTown(string $town): Address
    {
        $this->town = $town;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     *
     * @return $this
     */
    public function setPostcode(string $postcode): Address
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     *
     * @return $this
     */
    public function setCountryCode(string $countryCode): Address
    {
        $this->countryCode = $countryCode;

        return $this;
    }
}
