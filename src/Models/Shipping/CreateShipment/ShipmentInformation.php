<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment;

use JMS\Serializer\Annotation as JMS;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentItem;

/**
 * Shipment Information. Overall package details, item details and requested service information in a shipment request.
 *     -  It is important to ensure accurate information is supplied to ensure correct handling by different customs around the world.
 *
 * Required properties: ShipmentDate, ServiceCode, TotalPackages, TotalWeight
 */
class ShipmentInformation
{
    const PRODUCT_DOCUMENTS = 'DOX';
    const PRODUCT_OTHER = 'NDX';

    const SHIPMENT_ACTION_PROCESS = 'Process';
    const SHIPMENT_ACTION_CREATE = 'Create';
    const SHIPMENT_ACTION_ALLOCATE = 'Allocate';

    const LABEL_FORMAT_PDF = 'PDF';
    const LABEL_FORMAT_PNG = 'PNG';
    const LABEL_FORMAT_DATASTREAM = 'DATASTREAM';
    const LABEL_FORMAT_ZPL203DPI = 'ZPL203DPI';
    const LABEL_FORMAT_ZPL300DPI = 'ZPL300DPI';

    /**
     * Shipment Date
     *     - Date of despatch - YYYY-MM-DD.
     *     - Cannot be in the past. Max 28 days in the future.
     *
     * example: 2019-01-16
     * format: date
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $shipmentDate;

    /**
     * Service Code
     *     - Must be a valid system service code OR a customer mapped service code.
     *
     * example: TPLN
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $serviceCode;

    /**
     * Service Options
     *     - Only required if you have more than 1 Royal Mail Posting Location.
     *     - Allows you to add enhancements, specify the posting location, change the service level and specify a service format.
     *
     * @JMS\Type("SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\ServiceOptions")
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
     *     - *Optional/Overwritten for Average Weight Services - Average Weight Customers only.*
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
     * Description of Goods
     *     - General description of the goods being sent.
     *     - Required for Non-Document International and BFPO Shipments.
     *     - Ignored for Documents Only shipments.
     *
     * example: Clothing
     * maxLength: 70
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $descriptionOfGoods;

    /**
     * Reason For Export
     *     - Required for International Shipments and BFPO (British Forces Post Office).
     *
     * example: Sale of goods
     * maxLength: 250
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $reasonForExport;

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
     *     - Required for Non-Document International and BFPO Shipments, or when values are provided.
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
     * Requested Label Format
     *     - *DATASTREAM is only available if it has been activated on your account.*
     *     - Ignored if ShipmentAction set to Create or Allocate.
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $labelFormat;

    /**
     * Silent Print Profile
     *     - If present, resulting labels will be printed using this profile.
     *
     * example: 75b59db8-3cd3-4578-888e-54be016f07cc
     * format: uuid
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $silentPrintProfile;

    /**
     * Shipment Action
     *     - **Process** - Shipment created and processed, ready for manifesting. Label and tracking number returned.
     *     - **Create** - Shipment created as unprocessed, ready for scanning. Scanning will create label and tracking number and move shipment to processed.
     *     - **Allocate** - Shipment created as unprocessed with tracking number allocated and returned and label created but not returned. Scanning will return label and move shipment to processed.
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $shipmentAction;

    /**
     * Shipment Packages
     *     - The packages in the shipment.
     *     - Required if TotalPackages is more than 1.
     *
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\ShipmentPackage>")
     *
     * @var ShipmentPackage[]|null
     */
    protected $packages;

    /**
     * Shipment Items
     *     - The items in the shipment.
     *     - Required for Non-Document International Shipments and BFPO (British Forces Post Office).
     *     - Ignored for Documents Only shipments.
     *
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ShipmentItem>")
     *
     * @var ShipmentItem[]|null
     */
    protected $items;

    /**
     * Get shipmentDate
     *
     * @return string
     */
    public function getShipmentDate(): string
    {
        return $this->shipmentDate;
    }

    /**
     * Set shipmentDate
     *
     * @param string $shipmentDate
     *
     * @return $this
     */
    public function setShipmentDate(string $shipmentDate): self
    {
        $this->shipmentDate = $shipmentDate;

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
     * Get descriptionOfGoods
     *
     * @return string|null
     */
    public function getDescriptionOfGoods(): ?string
    {
        return $this->descriptionOfGoods;
    }

    /**
     * Set descriptionOfGoods
     *
     * @param string|null $descriptionOfGoods
     *
     * @return $this
     */
    public function setDescriptionOfGoods(?string $descriptionOfGoods): self
    {
        $this->descriptionOfGoods = $descriptionOfGoods;

        return $this;
    }

    /**
     * Get reasonForExport
     *
     * @return string|null
     */
    public function getReasonForExport(): ?string
    {
        return $this->reasonForExport;
    }

    /**
     * Set reasonForExport
     *
     * @param string|null $reasonForExport
     *
     * @return $this
     */
    public function setReasonForExport(?string $reasonForExport): self
    {
        $this->reasonForExport = $reasonForExport;

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
     * Get labelFormat
     *
     * @return string|null
     */
    public function getLabelFormat(): ?string
    {
        return $this->labelFormat;
    }

    /**
     * Set labelFormat
     *
     * @param string|null $labelFormat
     *
     * @return $this
     */
    public function setLabelFormat(?string $labelFormat): self
    {
        $this->labelFormat = $labelFormat;

        return $this;
    }

    /**
     * Get silentPrintProfile
     *
     * @return string|null
     */
    public function getSilentPrintProfile(): ?string
    {
        return $this->silentPrintProfile;
    }

    /**
     * Set silentPrintProfile
     *
     * @param string|null $silentPrintProfile
     *
     * @return $this
     */
    public function setSilentPrintProfile(?string $silentPrintProfile): self
    {
        $this->silentPrintProfile = $silentPrintProfile;

        return $this;
    }

    /**
     * Get shipmentAction
     *
     * @return string|null
     */
    public function getShipmentAction(): ?string
    {
        return $this->shipmentAction;
    }

    /**
     * Set shipmentAction
     *
     * @param string|null $shipmentAction
     *
     * @return $this
     */
    public function setShipmentAction(?string $shipmentAction): self
    {
        $this->shipmentAction = $shipmentAction;

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

    /**
     * Get items
     *
     * @return ShipmentItem[]|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * Set items
     *
     * @param ShipmentItem[]|null $items
     *
     * @return $this
     */
    public function setItems(?array $items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Add item
     *
     * @var mixed
     *
     * @param mixed $item
     *
     * @return $this
     */
    public function addItem($item): self
    {
        if (!is_array($this->items)) {
            $this->items = [];
        }

        $this->items[] = $item;

        return $this;
    }
}
