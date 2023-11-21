<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Response;

use JMS\Serializer\Annotation as JMS;

class PackageResponse
{
    /**
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected ?string $shipmentId = null;

    /**
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected ?string $trackingNumber = null;

    /**
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected ?string $carrierTrackingUrl = null;

    /**
     * @return string|null
     */
    public function getShipmentId(): ?string
    {
        return $this->shipmentId;
    }

    /**
     * @return string|null
     */
    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * @return string|null
     */
    public function getCarrierTrackingUrl(): ?string
    {
        return $this->carrierTrackingUrl;
    }
}
