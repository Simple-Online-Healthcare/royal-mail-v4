<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment;

use JMS\Serializer\Annotation as JMS;

/**
 * The Service Options for a Royal Mail Shipment, used in a shipment request.
 *     - Required if have more than 1 possible Posting Location.
 *
 * Required properties: PostingLocation
 */
class ServiceOptions
{
    const SERVICE_FORMAT_LETTER = 'L';
    const SERVICE_FORMAT_LARGE_LETTER = 'F';
    const SERVICE_FORMAT_PARCEL = 'P';
    const SERVICE_FORMAT_PRINTER_PAPERS = 'S';

    const CONSEQUENTIAL_LOSS_LEVEL_1 = 'Level1';
    const CONSEQUENTIAL_LOSS_LEVEL_2 = 'Level2';
    const CONSEQUENTIAL_LOSS_LEVEL_3 = 'Level3';
    const CONSEQUENTIAL_LOSS_LEVEL_4 = 'Level4';
    const CONSEQUENTIAL_LOSS_LEVEL_5 = 'Level5';

    /**
     * Posting Location.
     *     - Optional if you only have 1 Posting Location.
     *
     * example: 123456789
     * minLength: 10
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $postingLocation;

    /**
     * Service Level
     *     - Valid values are 01-99.
     *     - Defaults to lowest service level if not provided.
     *
     * example: 01
     * minLength: 2
     * maxLength: 2
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $serviceLevel;

    /**
     * Service Format
     *     - **L** - Letter
     *     - **F** - Large Letter
     *     - **P** - Parcel
     *     - **S** - Printed Papers - International Services Only
     *
     * example: P
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $serviceFormat;

    /**
     * Safe Place Enhancement
     *     - Free text to describe a safe place to leave the parcel.
     *     - Returns an error if the service does not allow Safeplace.
     *
     * example: Front Porch
     * maxLength: 30
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $safeplace;

    /**
     * Saturday Guaranteed Enhancement
     *     - Available for Domestic Special Delivery Services Only
     *     - Returns an error if requested and the service does not allow it.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool|null
     */
    protected $saturdayGuaranteed;

    /**
     * Consequential Loss Enhancement
     *     - Available for Domestic Special Delivery Services Only.
     *     - **Level1** - £1,000
     *     - **Level2** - £2,500
     *     - **Level3** - £5,000
     *     - **Level4** - £7,500
     *     - **Level5** - £10,000
     *     - Returns an error if requested and the service does not allow it.
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $consequentialLoss;

    /**
     * Local Collect Enhancement
     *     - Available for Domestic Special Delivery and Domestic Tracked services only.
     *     - Returns an error if requested and the service does not allow it.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool|null
     */
    protected $localCollect;

    /**
     * Tracking Notifications Enhancement
     *     - Available for Domestic Special Delivery and Domestic Tracked services only.
     *     - Returns an error if requested and the service does not allow it.
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $trackingNotifications;

    /**
     * Recorded Signed For
     *     - Available for all Domestic Services that are not Special Delivery, Tracked or BFPO.
     *     - This is an enhancement for services that don't have an in-built signature service like Special Delivery and Tracked.
     *     - Returns an error if requested and the service does not allow it.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool|null
     */
    protected $recordedSignedFor;

    /**
     * Get postingLocation
     *
     * @return string
     */
    public function getPostingLocation(): string
    {
        return $this->postingLocation;
    }

    /**
     * Set postingLocation
     *
     * @param string $postingLocation
     *
     * @return $this
     */
    public function setPostingLocation(string $postingLocation): self
    {
        $this->postingLocation = $postingLocation;

        return $this;
    }

    /**
     * Get serviceLevel
     *
     * @return string|null
     */
    public function getServiceLevel(): ?string
    {
        return $this->serviceLevel;
    }

    /**
     * Set serviceLevel
     *
     * @param string|null $serviceLevel
     *
     * @return $this
     */
    public function setServiceLevel(?string $serviceLevel): self
    {
        $this->serviceLevel = $serviceLevel;

        return $this;
    }

    /**
     * Get serviceFormat
     *
     * @return string|null
     */
    public function getServiceFormat(): ?string
    {
        return $this->serviceFormat;
    }

    /**
     * Set serviceFormat
     *
     * @param string|null $serviceFormat
     *
     * @return $this
     */
    public function setServiceFormat(?string $serviceFormat): self
    {
        $this->serviceFormat = $serviceFormat;

        return $this;
    }

    /**
     * Get safeplace
     *
     * @return string|null
     */
    public function getSafeplace(): ?string
    {
        return $this->safeplace;
    }

    /**
     * Set safeplace
     *
     * @param string|null $safeplace
     *
     * @return $this
     */
    public function setSafeplace(?string $safeplace): self
    {
        $this->safeplace = $safeplace;

        return $this;
    }

    /**
     * Get saturdayGuaranteed
     *
     * @return bool|null
     */
    public function getSaturdayGuaranteed(): ?bool
    {
        return $this->saturdayGuaranteed;
    }

    /**
     * Set saturdayGuaranteed
     *
     * @param bool|null $saturdayGuaranteed
     *
     * @return $this
     */
    public function setSaturdayGuaranteed(?bool $saturdayGuaranteed): self
    {
        $this->saturdayGuaranteed = $saturdayGuaranteed;

        return $this;
    }

    /**
     * Get consequentialLoss
     *
     * @return string|null
     */
    public function getConsequentialLoss(): ?string
    {
        return $this->consequentialLoss;
    }

    /**
     * Set consequentialLoss
     *
     * @param string|null $consequentialLoss
     *
     * @return $this
     */
    public function setConsequentialLoss(?string $consequentialLoss): self
    {
        $this->consequentialLoss = $consequentialLoss;

        return $this;
    }

    /**
     * Get localCollect
     *
     * @return bool|null
     */
    public function getLocalCollect(): ?bool
    {
        return $this->localCollect;
    }

    /**
     * Set localCollect
     *
     * @param bool|null $localCollect
     *
     * @return $this
     */
    public function setLocalCollect(?bool $localCollect): self
    {
        $this->localCollect = $localCollect;

        return $this;
    }

    /**
     * Get trackingNotifications
     *
     * @return string|null
     */
    public function getTrackingNotifications(): ?string
    {
        return $this->trackingNotifications;
    }

    /**
     * Set trackingNotifications
     *
     * @param string|null $trackingNotifications
     *
     * @return $this
     */
    public function setTrackingNotifications(?string $trackingNotifications): self
    {
        $this->trackingNotifications = $trackingNotifications;

        return $this;
    }

    /**
     * Get recordedSignedFor
     *
     * @return bool|null
     */
    public function getRecordedSignedFor(): ?bool
    {
        return $this->recordedSignedFor;
    }

    /**
     * Set recordedSignedFor
     *
     * @param bool|null $recordedSignedFor
     *
     * @return $this
     */
    public function setRecordedSignedFor(?bool $recordedSignedFor): self
    {
        $this->recordedSignedFor = $recordedSignedFor;

        return $this;
    }
}
