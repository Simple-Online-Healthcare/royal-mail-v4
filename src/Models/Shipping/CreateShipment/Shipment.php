<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment;

use JMS\Serializer\Annotation as JMS;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\Shipper;

/**
 * Details of a shipment request.
 *
 * Required properties: Destination, ShipmentInformation
 */
class Shipment
{
    /**
     * The Shipper
     *     - Who and where the parcel is coming from.
     *     - Optional. If not supplied, the posting location address will be used.
     *
     * @JMS\Type("SimpleOnlineHealthcare\RoyalMail\Models\Shipping\Shipper")
     *
     * @var Shipper|null
     */
    protected $shipper;

    /**
     * The Destination
     *     - Who and where the parcel is going to.
     *     - It is the shipper’s responsibility to provide accurate and concise information to ensure the best possible delivery experience for the consumer.
     *
     * @JMS\Type("SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Destination")
     *
     * @var Destination
     */
    protected $destination;

    /**
     * Shipment Information
     *     - Overall package details and requested service information
     *
     * @JMS\Type("SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\ShipmentInformation")
     *
     * @var ShipmentInformation
     */
    protected $shipmentInformation;

    /**
     * Get shipper
     *
     * @return Shipper|null
     */
    public function getShipper(): ?Shipper
    {
        return $this->shipper;
    }

    /**
     * Set shipper
     *
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
     * Get destination
     *
     * @return Destination
     */
    public function getDestination(): Destination
    {
        return $this->destination;
    }

    /**
     * Set destination
     *
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
     * Get shipmentInformation
     *
     * @return ShipmentInformation
     */
    public function getShipmentInformation(): ShipmentInformation
    {
        return $this->shipmentInformation;
    }

    /**
     * Set shipmentInformation
     *
     * @param ShipmentInformation $shipmentInformation
     *
     * @return $this
     */
    public function setShipmentInformation(ShipmentInformation $shipmentInformation): self
    {
        $this->shipmentInformation = $shipmentInformation;

        return $this;
    }
}
