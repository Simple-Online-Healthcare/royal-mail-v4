<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability;

use JMS\Serializer\Annotation as JMS;

/**
 * Available Format for a service, with the maximum possible weight allowed.
 *
 * Required properties: FormatDescription, MaxWeight
 */
class Format
{
    /**
     * Service Format
     *     - An available service format for this service.
     *     - If blank, then formats are not applicable for this service.
     *     - **L** - Letter
     *     - **F** - Large Letter
     *     - **P** - Parcel
     *     - **S** - Printed Papers
     *     - **Blank** - Not Applicable
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $serviceFormat;

    /**
     * Format Description
     *     - A description of the Service Format
     *     - Letter
     *     - Large Letter
     *     - Parcel
     *     - International Printed Papaers
     *     - Not Applicable
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $formatDescription;

    /**
     * Maximum Weight
     *     - The maximum weight allowed for this format (or service if formats not applicable) in specified Unit of Measure.
     *
     * example: 0.75
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $maxWeight;

    /**
     * Get serviceFormat
     *
     * @return string|null
     */
    public function getServiceFormat(): ?string
    {
        return $this->serviceFormat;
    }

    /**
     * Set serviceFormat
     *
     * @param string|null $serviceFormat
     *
     * @return $this
     */
    public function setServiceFormat(?string $serviceFormat): self
    {
        $this->serviceFormat = $serviceFormat;

        return $this;
    }

    /**
     * Get formatDescription
     *
     * @return string
     */
    public function getFormatDescription(): string
    {
        return $this->formatDescription;
    }

    /**
     * Set formatDescription
     *
     * @param string $formatDescription
     *
     * @return $this
     */
    public function setFormatDescription(string $formatDescription): self
    {
        $this->formatDescription = $formatDescription;

        return $this;
    }

    /**
     * Get maxWeight
     *
     * @return float
     */
    public function getMaxWeight(): float
    {
        return $this->maxWeight;
    }

    /**
     * Set maxWeight
     *
     * @param float $maxWeight
     *
     * @return $this
     */
    public function setMaxWeight(float $maxWeight): self
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }
}
