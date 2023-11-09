<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability;

use JMS\Serializer\Annotation as JMS;

/**
 * Shipment Information
 *     - Overall package details and requested service requirements.
 *
 * Required properties: TotalPackages, TotalWeight
 */
class ShipmentInformation
{
    /**
     * Service Code
     *     - Must be a valid system service code OR a customer mapped service code.
     *     - If service code is not supplied a list of all available service options will be returned, otherwise only information about the service requested will be returned.
     *
     * example: TPLN
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $serviceCode;

    /**
     * Service Options
     *     - Specify any service requirements such as format required or enhancements required.
     *
     * @JMS\Type("SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability\ServiceOptions")
     *
     * @var ServiceOptions|null
     */
    protected $serviceOptions;

    /**
     * Number of Packages
     *     - The total number of packages.
     *
     * example: 1
     * format: int32
     *
     * @JMS\Type("int")
     *
     * @var int
     */
    protected $totalPackages;

    /**
     * Total Weight
     *     - The total weight of the shipment including packaging. Validated againt package weight.
     *     - Min weight: 1 gram.
     *
     * example: 2.2
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $totalWeight;

    /**
     * Weight Unit of Measure
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $weightUnitOfMeasure;

    /**
     * Shipment/Product type being shipped
     *     - **DOX** - Documents Only
     *     - **NDX** - All other shipment product types
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $product;

    /**
     * Total Shipment Value
     *     - Required for Non-Document International and BFPO Shipments.
     *     - Ignored for Documents Only shipments.
     *
     * example: 39.98
     * format: double
     *
     * @JMS\Type("float")
     *
     * @var float|null
     */
    protected $value;

    /**
     * Currency
     *     - This currency will be used for all values across the shipment request.
     *     - 3 digit ISO Currency Code.
     *     - Required for Non-Document International and BFPO Shipments, or when value is provided.
     *     - Ignored for Documents Only shipments.
     *
     * example: GBP
     * minLength: 3
     * maxLength: 3
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $currency;

    /**
     * Shipment Packages
     *     - The packages in the shipment.
     *     - Required if TotalPackages is more than 1.
     *
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability\ShipmentPackage>")
     *
     * @var ShipmentPackage[]|null
     */
    protected $packages;

    /**
     * Get serviceCode
     *
     * @return string|null
     */
    public function getServiceCode(): ?string
    {
        return $this->serviceCode;
    }

    /**
     * Set serviceCode
     *
     * @param string|null $serviceCode
     *
     * @return $this
     */
    public function setServiceCode(?string $serviceCode): self
    {
        $this->serviceCode = $serviceCode;

        return $this;
    }

    /**
     * Get serviceOptions
     *
     * @return ServiceOptions|null
     */
    public function getServiceOptions(): ?ServiceOptions
    {
        return $this->serviceOptions;
    }

    /**
     * Set serviceOptions
     *
     * @param ServiceOptions|null $serviceOptions
     *
     * @return $this
     */
    public function setServiceOptions(?ServiceOptions $serviceOptions): self
    {
        $this->serviceOptions = $serviceOptions;

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
     * Get product
     *
     * @return string|null
     */
    public function getProduct(): ?string
    {
        return $this->product;
    }

    /**
     * Set product
     *
     * @param string|null $product
     *
     * @return $this
     */
    public function setProduct(?string $product): self
    {
        $this->product = $product;

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
     * Get currency
     *
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Set currency
     *
     * @param string|null $currency
     *
     * @return $this
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get packages
     *
     * @return ShipmentPackage[]|null
     */
    public function getPackages(): ?array
    {
        return $this->packages;
    }

    /**
     * Set packages
     *
     * @param ShipmentPackage[]|null $packages
     *
     * @return $this
     */
    public function setPackages(?array $packages): self
    {
        $this->packages = $packages;

        return $this;
    }

    /**
     * Add package
     *
     * @var mixed
     *
     * @param mixed $package
     *
     * @return $this
     */
    public function addPackage($package): self
    {
        if (!is_array($this->packages)) {
            $this->packages = [];
        }

        $this->packages[] = $package;

        return $this;
    }
}
