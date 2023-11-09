<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * A request to manifest shipments created with the given carrier codes that are ready to manifest for a single posting location.
 *
 * Required properties: CarrierCodes, PostingLocation
 */
class ManifestCarrierCodesRequest
{
    /**
     * Carrier Codes
     *     - Must be valid system carrier codes.
     *
     * example:
     *     - RMG
     *     - PFCE
     * maxLength: 4
     *
     * @JMS\Type("array")
     *
     * @var array
     */
    protected $carrierCodes;

    /**
     * Posting Location.
     *     - Optional if you only have 1 Posting Location.
     *
     * example: 123456789
     * minLength: 10
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $postingLocation;

    /**
     * Get carrierCodes
     *
     * @return array
     */
    public function getCarrierCodes(): array
    {
        return $this->carrierCodes;
    }

    /**
     * Set carrierCodes
     *
     * @param array $carrierCodes
     *
     * @return $this
     */
    public function setCarrierCodes(array $carrierCodes): self
    {
        $this->carrierCodes = $carrierCodes;

        return $this;
    }

    /**
     * Add carrierCode
     *
     * @var mixed
     *
     * @param mixed $carrierCode
     *
     * @return $this
     */
    public function addCarrierCode($carrierCode): self
    {
        if (!is_array($this->carrierCodes)) {
            $this->carrierCodes = [];
        }

        $this->carrierCodes[] = $carrierCode;

        return $this;
    }

    /**
     * Get postingLocation
     *
     * @return string
     */
    public function getPostingLocation(): string
    {
        return $this->postingLocation;
    }

    /**
     * Set postingLocation
     *
     * @param string $postingLocation
     *
     * @return $this
     */
    public function setPostingLocation(string $postingLocation): self
    {
        $this->postingLocation = $postingLocation;

        return $this;
    }
}
