<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * A request to cancel a shipment.
 *
 * Required properties: ShipmentId, ReasonForCancellation
 */
class ShipmentCancelRequest
{
    /**
     * Shipment Id
     *     - The tracking number or Unique Id of the shipment to cancel.
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
     * Reason for Cancellation
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $reasonForCancellation;

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
     * Get reasonForCancellation
     *
     * @return string
     */
    public function getReasonForCancellation(): string
    {
        return $this->reasonForCancellation;
    }

    /**
     * Set reasonForCancellation
     *
     * @param string $reasonForCancellation
     *
     * @return $this
     */
    public function setReasonForCancellation(string $reasonForCancellation): self
    {
        $this->reasonForCancellation = $reasonForCancellation;

        return $this;
    }
}
