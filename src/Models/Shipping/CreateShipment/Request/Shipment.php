<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Request;

class Shipment
{
    /**
     * @var Shipper
     */
    protected Shipper $shipper;

    /**
     * @var Destination
     */
    protected Destination $destination;

    /**
     * @var ShipmentInformation
     */
    protected ShipmentInformation $shipmentInformation;

    /**
     * @var ShipmentPackage[]
     */
    protected array $packages = [];

    /**
     * @var CarrierSpecifics
     */
    protected CarrierSpecifics $carrierSpecifics;

    /**
     * @return Shipper|null
     */
    public function getShipper(): ?Shipper
    {
        return $this->shipper;
    }

    /**
     * @param Shipper|null $shipper
     *
     * @return $this
     */
    public function setShipper(?Shipper $shipper): self
    {
        $this->shipper = $shipper;

        return $this;
    }

    /**
     * @return Destination
     */
    public function getDestination(): Destination
    {
        return $this->destination;
    }

    /**
     * @param Destination $destination
     *
     * @return $this
     */
    public function setDestination(Destination $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return ShipmentInformation
     */
    public function getShipmentInformation(): ShipmentInformation
    {
        return $this->shipmentInformation;
    }

    /**
     * @param ShipmentInformation $shipmentInformation
     *
     * @return $this
     */
    public function setShipmentInformation(ShipmentInformation $shipmentInformation): self
    {
        $this->shipmentInformation = $shipmentInformation;

        return $this;
    }

    /**
     * @param ShipmentPackage $package
     *
     * @return $this
     */
    public function addPackage(ShipmentPackage $package): self
    {
        $this->packages[] = $package;

        return $this;
    }

    /**
     * @return ShipmentPackage[]
     */
    public function getPackages(): array
    {
        return $this->packages;
    }

    /**
     * @return CarrierSpecifics
     */
    public function getCarrierSpecifics(): CarrierSpecifics
    {
        return $this->carrierSpecifics;
    }

    /**
     * @param CarrierSpecifics $carrierSpecifics
     *
     * @return Shipment
     */
    public function setCarrierSpecifics(CarrierSpecifics $carrierSpecifics): Shipment
    {
        $this->carrierSpecifics = $carrierSpecifics;

        return $this;
    }
}
