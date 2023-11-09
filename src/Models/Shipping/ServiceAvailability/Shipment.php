<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability;

use JMS\Serializer\Annotation as JMS;

/**
 * Details of a shipment for a service availability check.
 *
 * Required properties: Destination, ShipmentInformation
 */
class Shipment
{
    /**
     * The Destination
     *     - Where the parcel is going to.
     *
     * @JMS\Type("SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability\Destination")
     *
     * @var Destination
     */
    protected $destination;

    /**
     * Shipment Information
     *     - Overall package details and requested service requirements.
     *
     * @JMS\Type("SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability\ShipmentInformation")
     *
     * @var ShipmentInformation
     */
    protected $shipmentInformation;

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
