<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Request to release 1 or more shipments from hold.
 */
class ShipmentsReleaseRequest
{
    /**
     * Shipment Ids
     *     - Tracking Numbers / Unique Ids of each shipment to release from hold.
     *
     * example:
     *     - RE012345673GB
     *     - 3A01234561234568AE7C7
     * minLength: 13
     * maxLength: 21
     *
     * @JMS\Type("array")
     *
     * @var array
     */
    protected $shipmentIds;

    /**
     * Get shipmentIds
     *
     * @return array
     */
    public function getShipmentIds(): array
    {
        return $this->shipmentIds;
    }

    /**
     * Set shipmentIds
     *
     * @param array $shipmentIds
     *
     * @return $this
     */
    public function setShipmentIds(array $shipmentIds): self
    {
        $this->shipmentIds = $shipmentIds;

        return $this;
    }

    /**
     * Add shipmentId
     *
     * @var mixed
     *
     * @param mixed $shipmentId
     *
     * @return $this
     */
    public function addShipmentId($shipmentId): self
    {
        if (!is_array($this->shipmentIds)) {
            $this->shipmentIds = [];
        }

        $this->shipmentIds[] = $shipmentId;

        return $this;
    }
}
