<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

class ShipmentCancelRequest
{
    public const REASON_ORDER_CANCELLED = 'Order Cancelled';

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     */
    protected array $shipmentIds = [];

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected string $reasonForCancellation = self::REASON_ORDER_CANCELLED;

    /**
     * @return string[]
     */
    public function getShipmentIds(): array
    {
        return $this->shipmentIds;
    }

    /**
     * @param string $shipmentId
     *
     * @return $this
     */
    public function addShipmentId(string $shipmentId): self
    {
        if (!in_array($shipmentId, $this->shipmentIds)) {
            $this->shipmentIds[] = $shipmentId;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getReasonForCancellation(): string
    {
        return $this->reasonForCancellation;
    }

    /**
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
