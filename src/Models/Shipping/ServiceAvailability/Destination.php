<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability;

use JMS\Serializer\Annotation as JMS;

/**
 * The Destination
 *     - Where the parcel is going to.
 */
class Destination
{
    /**
     * Destination Address ID
     *     - If supplied all destination address fields will be ignored and the stored address will be used.
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
     *     - Mandatory for all domestic destinations and some international destinations if the Address Id is not provided.
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
}
