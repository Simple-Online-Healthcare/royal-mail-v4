<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment;

use JMS\Serializer\Annotation as JMS;

/**
 * The destination address and contact details.
 *     - It is the shipper’s responsibility to provide accurate and concise information to ensure the best possible delivery experience for the consumer.
 */
class Destination
{
    /**
     * Destination Address ID
     *     - If supplied all destination address fields will be ignored and the stored address will be used.
     *     - *If a Safeplace is present in the stored address, the Safeplace enhancement will be used if the service allows it, otherwise it will be ignored. ShipmentInformation.ServiceOptions.Safeplace overrides the address Safeplace and forces Safeplace to be required enhancement of the service.*
     *
     * example: UNIQUEID123
     * maxLength: 70
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $addressId;

    /**
     * Company Name
     *
     * example: Company & Co.
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $companyName;

    /**
     * Contact Name
     *     - Required if Address Id is not provided.
     *
     * example: Jane Brown
     * maxLength: 40
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $contactName;

    /**
     * Address Line 1
     *     - Required if Address Id is not provided.
     *
     * example: White Horse
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $addressLine1;

    /**
     * Address Line 2
     *     - *Please ensure the address data is presented in line with the destination country formats.*
     *
     * example: 10 Round Road
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $addressLine2;

    /**
     * Address Line 3
     *     - *Please ensure the address data is presented in line with the destination country formats.*
     *
     * example: Mitre Peak
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $addressLine3;

    /**
     * Town
     *     - Required if Address Id is not provided.
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
     *     - Whether this is required or not is dependent on the country settings.
     *
     * example: Surrey
     * maxLength: 50
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $county;

    /**
     * Country Code
     *     - [ISO Alpha-2 Country Code](https://www.nationsonline.org/oneworld/country_code_list.htm)  per ISO 3166 Standard.  Required if Address Id is not provided
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
     *     - Mandatory for all domestic shipments and some international shipments if the Address Id is not provided.
     *
     * example: AB3 5CD
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $postcode;

    /**
     * Contact Phone Number
     *     - Required if SMS notifications are requested (Service Enhancement Code 13 or 16) and Address Id is not provided.
     *     - Must be a valid phone number.
     *
     * example: 7123456789
     * maxLength: 20
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Contact Email Address
     *     - Required if email notifications are requested (Service Enhancement Code 14 or 16) and Address Id is not provided.
     *     - Must be a valid email address.
     *
     * example: email@example.com
     * maxLength: 254
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $emailAddress;

    /**
     * VAT Number
     *
     * example: GB123 4567 89
     * maxLength: 20
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $vatNumber;

    /**
     * Get addressId
     *
     * @return string
     */
    public function getAddressId(): string
    {
        return $this->addressId;
    }

    /**
     * Set addressId
     *
     * @param string $addressId
     *
     * @return $this
     */
    public function setAddressId(string $addressId): self
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return $this
     */
    public function setCompanyName(string $companyName): self
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
     * @return string
     */
    public function getAddressLine2(): string
    {
        return $this->addressLine2;
    }

    /**
     * Set addressLine2
     *
     * @param string $addressLine2
     *
     * @return $this
     */
    public function setAddressLine2(string $addressLine2): self
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * Get addressLine3
     *
     * @return string
     */
    public function getAddressLine3(): string
    {
        return $this->addressLine3;
    }

    /**
     * Set addressLine3
     *
     * @param string $addressLine3
     *
     * @return $this
     */
    public function setAddressLine3(string $addressLine3): self
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
     * @return string
     */
    public function getCounty(): string
    {
        return $this->county;
    }

    /**
     * Set county
     *
     * @param string $county
     *
     * @return $this
     */
    public function setCounty(string $county): self
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
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return $this
     */
    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return $this
     */
    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get vatNumber
     *
     * @return string
     */
    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    /**
     * Set vatNumber
     *
     * @param string $vatNumber
     *
     * @return $this
     */
    public function setVatNumber(string $vatNumber): self
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }
}
