<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * The shipper details for a shipment request.
 *     - Confirms the details of the shipper address and contact details.
 *     - If not supplied, the the posting location address will be used.
 */
class Shipper
{
    /**
     * Shipper Address Id
     *     - If supplied all shipper address fields will be ignored and the address from the Address Book will be used.
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
     * Shipper Reference
     *     - Your reference for this shipment.
     *     - This field is used for Returns processing and is usually the shippers order number provided to the consumer.
     *
     * example: REF123456789
     * maxLength: 40
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $shipperReference;

    /**
     * Shipper Department Code
     *     - For Royal Mail shipments, this code must be a valid 10-digit OBA department code.
     *
     * example: 123456789
     * maxLength: 30
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $shipperDepartment;

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
     *
     * example: Jane Smith
     * maxLength: 40
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $contactName;

    /**
     * Address Line 1
     *     - Populate with Shipper's address if provided.
     *
     * example: Level 5
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
     * example: Hashmoore House
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $addressLine2;

    /**
     * Address Line 3
     *
     * example: 10 Sky Lane
     * maxLength: 35
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $addressLine3;

    /**
     * Town
     *     - Required if address is populated.
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
     *     - [ISO Alpha-2 Country Code](https://www.nationsonline.org/oneworld/country_code_list.htm) per ISO 3166 Standard.
     *     - Required if address is populated.
     *     - Must be GB, IM, GG or JE.
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
     *     - Mandatory for all domestic addresses and some international shipments if address is populated.
     *
     * example: AA34 3AB
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $postcode;

    /**
     * Contact Phone Number
     *     - Must be a valid phone number.
     *
     * example: 7723456789
     * maxLength: 20
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Contact Email Address
     *     - Must be a valid email address.
     *
     * example: email@server.com
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
     * Get shipperReference
     *
     * @return string
     */
    public function getShipperReference(): string
    {
        return $this->shipperReference;
    }

    /**
     * Set shipperReference
     *
     * @param string $shipperReference
     *
     * @return $this
     */
    public function setShipperReference(string $shipperReference): self
    {
        $this->shipperReference = $shipperReference;

        return $this;
    }

    /**
     * Get shipperDepartment
     *
     * @return string
     */
    public function getShipperDepartment(): string
    {
        return $this->shipperDepartment;
    }

    /**
     * Set shipperDepartment
     *
     * @param string $shipperDepartment
     *
     * @return $this
     */
    public function setShipperDepartment(string $shipperDepartment): self
    {
        $this->shipperDepartment = $shipperDepartment;

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
