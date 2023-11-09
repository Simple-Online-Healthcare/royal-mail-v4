<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Details of an item in a shipment request, including what package it is in if possible.
 *
 * Required properties: Quantity
 */
class ShipmentItem
{
    /**
     * Item ID
     *     - If supplied all item fields except Item Quantity will be populated from the stored item record.
     *
     * example: UNIQUEID123
     * maxLength: 70
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $itemId;

    /**
     * Item Quantity
     *     - The quantity of items of this type.
     *
     * example: 2
     * format: int32
     *
     * @JMS\Type("int")
     *
     * @var int
     */
    protected $quantity;

    /**
     * Item Description
     *     - Required if an Item Id is not supplied.
     *
     * example: White Tee-shirt
     * maxLength: 255
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $description;

    /**
     * Item Value
     *     - Individual item value (use same currency as shipment currency).
     *     - Required if an Item Id is not supplied.
     *
     * example: 19.99
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float|null
     */
    protected $value;

    /**
     * Item Weight
     *     - Individual item weight.
     *
     * example: 0.9
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float|null
     */
    protected $weight;

    /**
     * Package Occurrence
     *     - Optional Package Occurrence used to indicate which package the item has been packed into.
     *
     * example: 1
     * format: int32
     *
     * @JMS\Type("int")
     *
     * @var int|null
     */
    protected $packageOccurrence;

    /**
     * HS Code
     *     - The [standardised commodity code](https://www.gov.uk/trade-tariff). It must be 6-12 digits only.
     *     - Used by Customs to calculate potential duties / taxes.
     *
     * example: 652534
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $hsCode;

    /**
     * SKU Code.
     *     - Used by Customs to calculate potential duties / taxes.
     *
     * example: SKU3455692
     * maxLength: 30
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $skuCode;

    /**
     * Country of Origin
     *     - [ISO Alpha-2 Country Code](https://www.nationsonline.org/oneworld/country_code_list.htm) of item country of origin, per ISO 3166 Standard
     *
     * example: CN
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $countryOfOrigin;

    /**
     * Image URL
     *     - Used to save a link to an image of the item with the shipment details, so that this can be used in the Returns
     *     - system for consumers to see an image of the item when selecting items for return.
     *     - URL must be a publicly accessible image.
     *
     * example: http://www.myimagestore.com/myimage.jpg
     * maxLength: 1000
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $imageUrl;

    /**
     * Get itemId
     *
     * @return string|null
     */
    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    /**
     * Set itemId
     *
     * @param string|null $itemId
     *
     * @return $this
     */
    public function setItemId(?string $itemId): self
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Set quantity
     *
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get value
     *
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param float|null $value
     *
     * @return $this
     */
    public function setValue(?float $value): self
    {
        $this->value = $value;

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
     * Get packageOccurrence
     *
     * @return int|null
     */
    public function getPackageOccurrence(): ?int
    {
        return $this->packageOccurrence;
    }

    /**
     * Set packageOccurrence
     *
     * @param int|null $packageOccurrence
     *
     * @return $this
     */
    public function setPackageOccurrence(?int $packageOccurrence): self
    {
        $this->packageOccurrence = $packageOccurrence;

        return $this;
    }

    /**
     * Get hsCode
     *
     * @return string|null
     */
    public function getHsCode(): ?string
    {
        return $this->hsCode;
    }

    /**
     * Set hsCode
     *
     * @param string|null $hsCode
     *
     * @return $this
     */
    public function setHsCode(?string $hsCode): self
    {
        $this->hsCode = $hsCode;

        return $this;
    }

    /**
     * Get skuCode
     *
     * @return string|null
     */
    public function getSkuCode(): ?string
    {
        return $this->skuCode;
    }

    /**
     * Set skuCode
     *
     * @param string|null $skuCode
     *
     * @return $this
     */
    public function setSkuCode(?string $skuCode): self
    {
        $this->skuCode = $skuCode;

        return $this;
    }

    /**
     * Get countryOfOrigin
     *
     * @return string|null
     */
    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    /**
     * Set countryOfOrigin
     *
     * @param string|null $countryOfOrigin
     *
     * @return $this
     */
    public function setCountryOfOrigin(?string $countryOfOrigin): self
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * Set imageUrl
     *
     * @param string|null $imageUrl
     *
     * @return $this
     */
    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }
}
