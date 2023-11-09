<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * A request to manifest shipments created with the given service codes that are ready to manifest for a single posting location.
 *
 * Required properties: ServiceCodes, PostingLocation
 */
class ManifestServiceCodesRequest
{
    /**
     * Service Codes
     *     - Must be valid system service codes OR customer mapped service codes.
     *
     * example:
     *     - CRL1
     *     - CRL2
     * maxLength: 10
     *
     * @JMS\Type("array")
     *
     * @var array
     */
    protected $serviceCodes;

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
     * Get serviceCodes
     *
     * @return array
     */
    public function getServiceCodes(): array
    {
        return $this->serviceCodes;
    }

    /**
     * Set serviceCodes
     *
     * @param array $serviceCodes
     *
     * @return $this
     */
    public function setServiceCodes(array $serviceCodes): self
    {
        $this->serviceCodes = $serviceCodes;

        return $this;
    }

    /**
     * Add serviceCode
     *
     * @var mixed
     *
     * @param mixed $serviceCode
     *
     * @return $this
     */
    public function addServiceCode($serviceCode): self
    {
        if (!is_array($this->serviceCodes)) {
            $this->serviceCodes = [];
        }

        $this->serviceCodes[] = $serviceCode;

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
