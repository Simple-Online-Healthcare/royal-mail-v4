<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * An Item that is stored for use in shipment requests.
 *
 * Required properties: Description, Value, Currency
 *
 * @JMS\ExclusionPolicy("none")
 */
class Item
{
    /**
     * Unique ID
     *     - Your unique identifier for this item.
     *     - If not provided, a GUID will be generated.
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
     * Item Description
     *
     * example: White Tee-shirt
     * maxLength: 70
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $description;

    /**
     * Item Value
     *
     * example: 19.99
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $value;

    /**
     * Currency
     *     - 3 digit ISO Currency Code
     *
     * example: GBP
     * minLength: 3
     * maxLength: 3
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $currency;

    /**
     * Item Weight
     *     - The weight of this item.
     *     - Min weight: 1 gram.
     *
     * example: 0.432
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float|null
     */
    protected $weight;

    /**
     * Weight Unit of Measure
     *     - If using Grams, minimum weight is 1 and partial numbers will be ignored.
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $weightUnitOfMeasure;

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
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param float $value
     *
     * @return $this
     */
    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

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
