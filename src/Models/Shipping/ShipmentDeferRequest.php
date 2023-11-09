<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * A request to defer a shipment to a later date.
 *
 * Required properties: ShipmentId, ShipmentDate
 */
class ShipmentDeferRequest
{
    /**
     * Shipment Id
     *     - The tracking number or Unique Id of the shipment to defer.
     *
     * example: ED521469583GB
     * minLength: 13
     * maxLength: 21
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $shipmentId;

    /**
     * Shipment Date
     *     - Date of despatch – YYYY-MM-DD
     *     - Cannot be in the past. Max 28 days in the future.
     *
     * example: 2019-01-19
     * format: date
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $shipmentDate;

    /**
     * Get shipmentId
     *
     * @return string
     */
    public function getShipmentId(): string
    {
        return $this->shipmentId;
    }

    /**
     * Set shipmentId
     *
     * @param string $shipmentId
     *
     * @return $this
     */
    public function setShipmentId(string $shipmentId): self
    {
        $this->shipmentId = $shipmentId;

        return $this;
    }

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
}
