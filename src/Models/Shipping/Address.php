<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * An address that is part of the address book.
 *     - A stored address can be used in shipment requests.
 *
 * Required properties: IsReturnAddress, ContactName, AddressLine1, Town, CountryCode
 */
class Address
{
    /**
     * Address ID
     *     - Your unique identifier for this address.
     *     - If not provided, a GUID will be generated.
     *
     * example: UNIQUEID123
     * maxLength: 70
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $addressId;

    /**
     * Is Return Address
     *     - If true, then this address is also available as a return address.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $isReturnAddress;

    /**
     * Company Name
     *     - *Ignored if is a return address*
     *
     * example: Company & Co.
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $companyName;

    /**
     * Contact Name / Return Name
     *
     * example: John Smith
     * maxLength: 40
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $contactName;

    /**
     * Address Line 1
     *
     * example: Brown Cottage
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $addressLine1;

    /**
     * Address Line 2
     *
     * example: 10 Sky Lane
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $addressLine2;

    /**
     * Address Line 3
     *
     * example: Branton
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $addressLine3;

    /**
     * Town
     *
     * example: Leatherhead
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $town;

    /**
     * County / State / Province
     *     - Conditional dependent on country.
     *     - USA, Australia and Canada all require a valid state code or name.
     *
     * example: Surrey
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $county;

    /**
     * Country Code
     *     - [ISO Alpha-2 Country Code](https://www.nationsonline.org/oneworld/country_code_list.htm) per ISO 3166 Standard
     *     - *Required to be GB if is a return address*
     *
     * example: GB
     * minLength: 2
     * maxLength: 2
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $countryCode;

    /**
     * Postcode / Zip
     *     - Required for domestic addresses and some international addresses.
     *
     * example: TW20 0HJ
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $postcode;

    /**
     * Contact Phone Number
     *     - Required for destination addresses where SMS notifications are requested.
     *     - (Service Enhancement Code 13 or 16)
     *     - *Ignored if is a return address*
     *
     * example: 7723456789
     * maxLength: 20
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $phoneNumber;

    /**
     * Contact Email Address
     *     - Required for destination addresses where email notifications are requested.
     *     - (Service Enhancement Code 14 or 16)
     *     - *Ignored if is a Return Address*
     *
     * example: email@example.com
     * maxLength: 254
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $emailAddress;

    /**
     * VAT Number
     *     - *Ignored if is a return address*
     *
     * example: GB123 4567 89
     * maxLength: 20
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $vatNumber;

    /**
     * Safeplace
     *     - Free text to describe a safe place to leave the parcel if the service allows it.
     *     - *Ignored if is a return address*
     *
     * example: Front Porch
     * maxLength: 30
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $safeplace;

    /**
     * Get addressId
     *
     * @return string|null
     */
    public function getAddressId(): ?string
    {
        return $this->addressId;
    }

    /**
     * Set addressId
     *
     * @param string|null $addressId
     *
     * @return $this
     */
    public function setAddressId(?string $addressId): self
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Get isReturnAddress
     *
     * @return bool
     */
    public function getIsReturnAddress(): bool
    {
        return $this->isReturnAddress;
    }

    /**
     * Set isReturnAddress
     *
     * @param bool $isReturnAddress
     *
     * @return $this
     */
    public function setIsReturnAddress(bool $isReturnAddress): self
    {
        $this->isReturnAddress = $isReturnAddress;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Set companyName
     *
     * @param string|null $companyName
     *
     * @return $this
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName(): string
    {
        return $this->contactName;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     *
     * @return $this
     */
    public function setContactName(string $contactName): self
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get addressLine1
     *
     * @return string
     */
    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    /**
     * Set addressLine1
     *
     * @param string $addressLine1
     *
     * @return $this
     */
    public function setAddressLine1(string $addressLine1): self
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * Get addressLine2
     *
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * Set addressLine2
     *
     * @param string|null $addressLine2
     *
     * @return $this
     */
    public function setAddressLine2(?string $addressLine2): self
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * Get addressLine3
     *
     * @return string|null
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * Set addressLine3
     *
     * @param string|null $addressLine3
     *
     * @return $this
     */
    public function setAddressLine3(?string $addressLine3): self
    {
        $this->addressLine3 = $addressLine3;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown(): string
    {
        return $this->town;
    }

    /**
     * Set town
     *
     * @param string $town
     *
     * @return $this
     */
    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get county
     *
     * @return string|null
     */
    public function getCounty(): ?string
    {
        return $this->county;
    }

    /**
     * Set county
     *
     * @param string|null $county
     *
     * @return $this
     */
    public function setCounty(?string $county): self
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     *
     * @return $this
     */
    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string|null
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * Set postcode
     *
     * @param string|null $postcode
     *
     * @return $this
     */
    public function setPostcode(?string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Set phoneNumber
     *
     * @param string|null $phoneNumber
     *
     * @return $this
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string|null
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Set emailAddress
     *
     * @param string|null $emailAddress
     *
     * @return $this
     */
    public function setEmailAddress(?string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get vatNumber
     *
     * @return string|null
     */
    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    /**
     * Set vatNumber
     *
     * @param string|null $vatNumber
     *
     * @return $this
     */
    public function setVatNumber(?string $vatNumber): self
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    /**
     * Get safeplace
     *
     * @return string|null
     */
    public function getSafeplace(): ?string
    {
        return $this->safeplace;
    }

    /**
     * Set safeplace
     *
     * @param string|null $safeplace
     *
     * @return $this
     */
    public function setSafeplace(?string $safeplace): self
    {
        $this->safeplace = $safeplace;

        return $this;
    }
}
