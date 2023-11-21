<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Request;

class ShipmentInformation
{
    const PRODUCT_DOCUMENTS = 'DOX';
    const PRODUCT_OTHER = 'NDX';
    const LABEL_FORMAT_PDF = 'PDF';

    /**
     * @var string
     */
    protected string $contentType = self::PRODUCT_OTHER;

    /**
     * @var string
     */
    protected string $serviceCode;

    /**
     * @var string
     */
    protected string $descriptionOfGoods;

    /**
     * @var string
     * example: 2023-12-31
     */
    protected string $shipmentDate;

    /**
     * @var string
     */
    protected string $weightUnitOfMeasure;

    /**
     * @var string
     */
    protected string $dimensionsUnitOfMeasure;

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     *
     * @return ShipmentInformation
     */
    public function setContentType(string $contentType): ShipmentInformation
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return string
     */
    public function getServiceCode(): string
    {
        return $this->serviceCode;
    }

    /**
     * @param string $serviceCode
     *
     * @return ShipmentInformation
     */
    public function setServiceCode(string $serviceCode): ShipmentInformation
    {
        $this->serviceCode = $serviceCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionOfGoods(): string
    {
        return $this->descriptionOfGoods;
    }

    /**
     * @param string $descriptionOfGoods
     *
     * @return ShipmentInformation
     */
    public function setDescriptionOfGoods(string $descriptionOfGoods): ShipmentInformation
    {
        $this->descriptionOfGoods = $descriptionOfGoods;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentDate(): string
    {
        return $this->shipmentDate;
    }

    /**
     * @param string $shipmentDate
     *
     * @return ShipmentInformation
     */
    public function setShipmentDate(string $shipmentDate): ShipmentInformation
    {
        $this->shipmentDate = $shipmentDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getWeightUnitOfMeasure(): string
    {
        return $this->weightUnitOfMeasure;
    }

    /**
     * @param string $weightUnitOfMeasure
     *
     * @return ShipmentInformation
     */
    public function setWeightUnitOfMeasure(string $weightUnitOfMeasure): ShipmentInformation
    {
        $this->weightUnitOfMeasure = $weightUnitOfMeasure;

        return $this;
    }

    /**
     * @return string
     */
    public function getDimensionsUnitOfMeasure(): string
    {
        return $this->dimensionsUnitOfMeasure;
    }

    /**
     * @param string $dimensionsUnitOfMeasure
     *
     * @return ShipmentInformation
     */
    public function setDimensionsUnitOfMeasure(string $dimensionsUnitOfMeasure): ShipmentInformation
    {
        $this->dimensionsUnitOfMeasure = $dimensionsUnitOfMeasure;

        return $this;
    }
}
