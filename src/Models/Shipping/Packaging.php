<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Packaging details that are stored, to be used in shipment requests.
 *
 * Required properties: Name, Length, Width, Height
 */
class Packaging
{
    /**
     * Packaging Unique ID
     *     - Your unique identifier for these packaging details.
     *     - If not provided, a GUID will be generated.
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
     * Name
     *     - The descriptive name of these packaging details
     *
     * example: Small Box
     * maxLength: 40
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $name;

    /**
     * Packaging Weight
     *     - The weight of this packaging.
     *     - Min weight: 1 gram.
     *
     * example: 0.008
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float|null
     */
    protected $weight;

    /**
     * Weight Unit of Measure
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $weightUnitOfMeasure;

    /**
     * Packaging Length
     *     - The length of this packaging in CM
     *
     * example: 15
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $length;

    /**
     * Packaging Width
     *     - The width of this packaging in CM
     *
     * example: 15
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $width;

    /**
     * Packaging Height
     *     - The height of this packaging in CM
     *
     * example: 5
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $height;

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
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * Set weight
     *
     * @param float|null $weight
     *
     * @return $this
     */
    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weightUnitOfMeasure
     *
     * @return string|null
     */
    public function getWeightUnitOfMeasure(): ?string
    {
        return $this->weightUnitOfMeasure;
    }

    /**
     * Set weightUnitOfMeasure
     *
     * @param string|null $weightUnitOfMeasure
     *
     * @return $this
     */
    public function setWeightUnitOfMeasure(?string $weightUnitOfMeasure): self
    {
        $this->weightUnitOfMeasure = $weightUnitOfMeasure;

        return $this;
    }

    /**
     * Get length
     *
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * Set length
     *
     * @param float $length
     *
     * @return $this
     */
    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * Set width
     *
     * @param float $width
     *
     * @return $this
     */
    public function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * Set height
     *
     * @param float $height
     *
     * @return $this
     */
    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }
}
