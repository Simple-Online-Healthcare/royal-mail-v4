<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment;

use JMS\Serializer\Annotation as JMS;

/**
 * Details of a package in a shipment request.
 *     - Enter the dimensions and weight of the package in the shipment. Use the PackageOccurance to indicate the items within the package.
 *
 * Required properties: PackageOccurrence, Weight
 */
class ShipmentPackage
{
    /**
     * Package Occurrence
     *     - Unique package number within this shipment.
     *     - Cannot exceed total number of packages.
     *
     * example: 1
     * format: int32
     *
     * @JMS\Type("int")
     *
     * @var int
     */
    protected $packageOccurrence;

    /**
     * Packaging ID
     *     - If supplied, packaging details will be populated from the stored information.
     *
     * example: UNIQUEID123
     * maxLength: 70
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $packagingId;

    /**
     * Total Package Weight.
     *     - This field will be used as the Shipment Weight for single-package services such as RMG.
     *     - The package weight must be greater than or equal to the sum of all item weights and packaging, if this information is provided.
     *     - Min weight: 1 gram.
     *     - *Optional/Overwritten for Average Weight Services - Average Weight Customers only.*
     *
     * example: 2.2
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $weight;

    /**
     * Package Length
     *     - Dimensions are in Centimetres.
     *     - *Dimensions are optional, however supplying accurate information helps ensure a smooth delivery experience.*
     *
     * example: 15
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float|null
     */
    protected $length;

    /**
     * Package Width
     *     - Dimensions are in Centimetres.
     *     - *Dimensions are optional, however supplying accurate information helps ensure a smooth delivery experience.*
     *
     * example: 15
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float|null
     */
    protected $width;

    /**
     * Package Height
     *     - Dimensions are in Centimetres.
     *     - *Dimensions are optional, however supplying accurate information helps ensure a smooth delivery experience.*
     *
     * example: 5
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float|null
     */
    protected $height;

    /**
     * Get packageOccurrence
     *
     * @return int
     */
    public function getPackageOccurrence(): int
    {
        return $this->packageOccurrence;
    }

    /**
     * Set packageOccurrence
     *
     * @param int $packageOccurrence
     *
     * @return $this
     */
    public function setPackageOccurrence(int $packageOccurrence): self
    {
        $this->packageOccurrence = $packageOccurrence;

        return $this;
    }

    /**
     * Get packagingId
     *
     * @return string|null
     */
    public function getPackagingId(): ?string
    {
        return $this->packagingId;
    }

    /**
     * Set packagingId
     *
     * @param string|null $packagingId
     *
     * @return $this
     */
    public function setPackagingId(?string $packagingId): self
    {
        $this->packagingId = $packagingId;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return $this
     */
    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get length
     *
     * @return float|null
     */
    public function getLength(): ?float
    {
        return $this->length;
    }

    /**
     * Set length
     *
     * @param float|null $length
     *
     * @return $this
     */
    public function setLength(?float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get width
     *
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }

    /**
     * Set width
     *
     * @param float|null $width
     *
     * @return $this
     */
    public function setWidth(?float $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get height
     *
     * @return float|null
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }

    /**
     * Set height
     *
     * @param float|null $height
     *
     * @return $this
     */
    public function setHeight(?float $height): self
    {
        $this->height = $height;

        return $this;
    }
}
