<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * A request to hold a shipment.
 *
 * Required properties: ShipmentId, ReasonForHold
 */
class ShipmentHoldRequest
{
    /**
     * Shipment Id
     *     - The tracking number or Unique Id of the shipment to hold.
     *
     * example: RE012345673GB
     * minLength: 13
     * maxLength: 21
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $shipmentId;

    /**
     * Reason for Hold
     *     - Must match a Hold Reason set in Pro Shipping Maintenance / Hold Reasons.
     *
     * example: Awaiting part
     * maxLength: 30
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $reasonForHold;

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
     * Get reasonForHold
     *
     * @return string
     */
    public function getReasonForHold(): string
    {
        return $this->reasonForHold;
    }

    /**
     * Set reasonForHold
     *
     * @param string $reasonForHold
     *
     * @return $this
     */
    public function setReasonForHold(string $reasonForHold): self
    {
        $this->reasonForHold = $reasonForHold;

        return $this;
    }
}
