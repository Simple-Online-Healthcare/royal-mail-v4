<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability;

use JMS\Serializer\Annotation as JMS;

/**
 * An available service option based on your request.
 *
 * Required properties: ServiceCode, ServiceName, TransitDays, IsTracked, SignatureIncluded, RecordedSignedForAvailable, SafeplaceAvailable, LocalCollectAvailable, SaturdayGuaranteedAvailable, ConsequentialLossAvailable, FormatsAvailable
 */
class Option
{
    /**
     * Service Code
     *     - Customer Mapped Service Code or System Service Code for this service.
     *
     * example: OTA
     * maxLength: 10
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $serviceCode;

    /**
     * Service Name
     *
     * example: International Tracked On Account
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $serviceName;

    /**
     * Estimated Transit Days
     *
     * example: 4
     * format: int32
     *
     * @JMS\Type("int")
     *
     * @var int
     */
    protected $transitDays;

    /**
     * Is Tracked
     *     - If true, the service is a tracked service.
     *
     * example: 1
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $isTracked;

    /**
     * Signature Included
     *     - If true, a signature required on delivery is included with the service.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $signatureIncluded;

    /**
     * Recorded Signed For Enhancement Available
     *     - If true, the recorded signed for enhancement can be used with this service.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $recordedSignedForAvailable;

    /**
     * Safe Place Enhancement Available
     *     - If true, the safe place enhancement can be used with this service.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $safeplaceAvailable;

    /**
     * Local Collect Enhancement Available
     *     - If true, the local collect enhancement can be used with this service.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $localCollectAvailable;

    /**
     * Saturday Guaranteed Enhancement Available
     *     - If true, the saturday guaranteed enhancement can be used with this service.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $saturdayGuaranteedAvailable;

    /**
     * Consequential Loss Enhancement Available
     *     - If true, the consequential loss enhancement can be used with this service.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $consequentialLossAvailable;

    /**
     * Formats Available
     *     - All formats that are available for this service for the given weight, including the maximum weight possible for each format.
     *
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability\Format>")
     *
     * @var Format[]
     */
    protected $formatsAvailable;

    /**
     * Get serviceCode
     *
     * @return string
     */
    public function getServiceCode(): string
    {
        return $this->serviceCode;
    }

    /**
     * Set serviceCode
     *
     * @param string $serviceCode
     *
     * @return $this
     */
    public function setServiceCode(string $serviceCode): self
    {
        $this->serviceCode = $serviceCode;

        return $this;
    }

    /**
     * Get serviceName
     *
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * Set serviceName
     *
     * @param string $serviceName
     *
     * @return $this
     */
    public function setServiceName(string $serviceName): self
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    /**
     * Get transitDays
     *
     * @return int
     */
    public function getTransitDays(): int
    {
        return $this->transitDays;
    }

    /**
     * Set transitDays
     *
     * @param int $transitDays
     *
     * @return $this
     */
    public function setTransitDays(int $transitDays): self
    {
        $this->transitDays = $transitDays;

        return $this;
    }

    /**
     * Get isTracked
     *
     * @return bool
     */
    public function getIsTracked(): bool
    {
        return $this->isTracked;
    }

    /**
     * Set isTracked
     *
     * @param bool $isTracked
     *
     * @return $this
     */
    public function setIsTracked(bool $isTracked): self
    {
        $this->isTracked = $isTracked;

        return $this;
    }

    /**
     * Get signatureIncluded
     *
     * @return bool
     */
    public function getSignatureIncluded(): bool
    {
        return $this->signatureIncluded;
    }

    /**
     * Set signatureIncluded
     *
     * @param bool $signatureIncluded
     *
     * @return $this
     */
    public function setSignatureIncluded(bool $signatureIncluded): self
    {
        $this->signatureIncluded = $signatureIncluded;

        return $this;
    }

    /**
     * Get recordedSignedForAvailable
     *
     * @return bool
     */
    public function getRecordedSignedForAvailable(): bool
    {
        return $this->recordedSignedForAvailable;
    }

    /**
     * Set recordedSignedForAvailable
     *
     * @param bool $recordedSignedForAvailable
     *
     * @return $this
     */
    public function setRecordedSignedForAvailable(bool $recordedSignedForAvailable): self
    {
        $this->recordedSignedForAvailable = $recordedSignedForAvailable;

        return $this;
    }

    /**
     * Get safeplaceAvailable
     *
     * @return bool
     */
    public function getSafeplaceAvailable(): bool
    {
        return $this->safeplaceAvailable;
    }

    /**
     * Set safeplaceAvailable
     *
     * @param bool $safeplaceAvailable
     *
     * @return $this
     */
    public function setSafeplaceAvailable(bool $safeplaceAvailable): self
    {
        $this->safeplaceAvailable = $safeplaceAvailable;

        return $this;
    }

    /**
     * Get localCollectAvailable
     *
     * @return bool
     */
    public function getLocalCollectAvailable(): bool
    {
        return $this->localCollectAvailable;
    }

    /**
     * Set localCollectAvailable
     *
     * @param bool $localCollectAvailable
     *
     * @return $this
     */
    public function setLocalCollectAvailable(bool $localCollectAvailable): self
    {
        $this->localCollectAvailable = $localCollectAvailable;

        return $this;
    }

    /**
     * Get saturdayGuaranteedAvailable
     *
     * @return bool
     */
    public function getSaturdayGuaranteedAvailable(): bool
    {
        return $this->saturdayGuaranteedAvailable;
    }

    /**
     * Set saturdayGuaranteedAvailable
     *
     * @param bool $saturdayGuaranteedAvailable
     *
     * @return $this
     */
    public function setSaturdayGuaranteedAvailable(bool $saturdayGuaranteedAvailable): self
    {
        $this->saturdayGuaranteedAvailable = $saturdayGuaranteedAvailable;

        return $this;
    }

    /**
     * Get consequentialLossAvailable
     *
     * @return bool
     */
    public function getConsequentialLossAvailable(): bool
    {
        return $this->consequentialLossAvailable;
    }

    /**
     * Set consequentialLossAvailable
     *
     * @param bool $consequentialLossAvailable
     *
     * @return $this
     */
    public function setConsequentialLossAvailable(bool $consequentialLossAvailable): self
    {
        $this->consequentialLossAvailable = $consequentialLossAvailable;

        return $this;
    }

    /**
     * Get formatsAvailable
     *
     * @return Format[]
     */
    public function getFormatsAvailable(): array
    {
        return $this->formatsAvailable;
    }

    /**
     * Set formatsAvailable
     *
     * @param Format[] $formatsAvailable
     *
     * @return $this
     */
    public function setFormatsAvailable(array $formatsAvailable): self
    {
        $this->formatsAvailable = $formatsAvailable;

        return $this;
    }

    /**
     * Add formatsAvailable
     *
     * @var mixed
     *
     * @param mixed $formatsAvailable
     *
     * @return $this
     */
    public function addFormatsAvailable($formatsAvailable): self
    {
        if (!is_array($this->formatsAvailable)) {
            $this->formatsAvailable = [];
        }

        $this->formatsAvailable[] = $formatsAvailable;

        return $this;
    }
}
