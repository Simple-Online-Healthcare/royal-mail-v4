<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Details of a Manifest that is returned when manifests are successfully created.
 */
class Manifest
{
    /**
     * Manifest Number
     *
     * example: INT1810002000
     * maxLength: 18
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $manifestNumber;

    /**
     * Manifest Image
     *     - A base 64 encoded string of the manifest PDF.
     *
     * example: JVBERi0xLjQKJdP0zOEKMSAwIG9 ... iago8PAovQ3JlYXRpb25EYXRlKEQ6MjAxODA5MjcxM
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $manifestImage;

    /**
     * Carrier Code
     *     - The carrier that this manifest is for.
     *
     * example: RMG
     * maxLength: 4
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $carrierCode;

    /**
     * Service Code
     *     - The service included in this Manifest. If more than one, Mixed will be returned.
     *
     * example: Mixed
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $serviceCode;

    /**
     * Total Weight
     *     - Sum of the weight of all the packages included on the Manifest in KGs.
     *
     * example: 2.56
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $totalWeight;

    /**
     * Total Packages
     *     - The total number of packages included on the Manifest.
     *
     * example: 54
     * format: int32
     *
     * @JMS\Type("int")
     *
     * @var int
     */
    protected $totalPackages;

    /**
     * Get manifestNumber
     *
     * @return string
     */
    public function getManifestNumber(): string
    {
        return $this->manifestNumber;
    }

    /**
     * Set manifestNumber
     *
     * @param string $manifestNumber
     *
     * @return $this
     */
    public function setManifestNumber(string $manifestNumber): self
    {
        $this->manifestNumber = $manifestNumber;

        return $this;
    }

    /**
     * Get manifestImage
     *
     * @return string
     */
    public function getManifestImage(): string
    {
        return $this->manifestImage;
    }

    /**
     * Set manifestImage
     *
     * @param string $manifestImage
     *
     * @return $this
     */
    public function setManifestImage(string $manifestImage): self
    {
        $this->manifestImage = $manifestImage;

        return $this;
    }

    /**
     * Get carrierCode
     *
     * @return string
     */
    public function getCarrierCode(): string
    {
        return $this->carrierCode;
    }

    /**
     * Set carrierCode
     *
     * @param string $carrierCode
     *
     * @return $this
     */
    public function setCarrierCode(string $carrierCode): self
    {
        $this->carrierCode = $carrierCode;

        return $this;
    }

    /**
     * Get serviceCode
     *
     * @return string
     */
    public function getServiceCode(): string
    {
        return $this->serviceCode;
    }

    /**
     * Set serviceCode
     *
     * @param string $serviceCode
     *
     * @return $this
     */
    public function setServiceCode(string $serviceCode): self
    {
        $this->serviceCode = $serviceCode;

        return $this;
    }

    /**
     * Get totalWeight
     *
     * @return float
     */
    public function getTotalWeight(): float
    {
        return $this->totalWeight;
    }

    /**
     * Set totalWeight
     *
     * @param float $totalWeight
     *
     * @return $this
     */
    public function setTotalWeight(float $totalWeight): self
    {
        $this->totalWeight = $totalWeight;

        return $this;
    }

    /**
     * Get totalPackages
     *
     * @return int
     */
    public function getTotalPackages(): int
    {
        return $this->totalPackages;
    }

    /**
     * Set totalPackages
     *
     * @param int $totalPackages
     *
     * @return $this
     */
    public function setTotalPackages(int $totalPackages): self
    {
        $this->totalPackages = $totalPackages;

        return $this;
    }
}
