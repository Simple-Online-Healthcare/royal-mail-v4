<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability;

use JMS\Serializer\Annotation as JMS;

/**
 * Service Options
 *     - Specify any service requirements such as format required or enhancements required.
 */
class ServiceOptions
{
    /**
     * Service Format
     *     - If provided, only return services that support the given service format.
     *     - **L** - Letter
     *     - **F** - Large Letter
     *     - **P** - Parcel
     *     - **S** - Printed Papers - International Services Only
     *
     * example: P
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $serviceFormat;

    /**
     * Tracked Services
     *     - If true, only return Tracked Services.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $tracked;

    /**
     * Signature Required
     *     - If true, only return services that are either with signature or support the Recorded Signed For enhancement.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $signatureRequired;

    /**
     * Safe Place Enhancement
     *     - If true, only return services that support the Safe Place enhancement.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $safeplace;

    /**
     * Local Collect Enhancement
     *     - If true, only return services that support the Local Collect enhancement.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $localCollect;

    /**
     * Saturday Guaranteed Enhancement
     *     - If true, only return services that support the Saturday Guaranteed enhancement.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $saturdayGuaranteed;

    /**
     * Consequential Loss Enhancement
     *     - If true, only return services that support the Consequential Loss enhancement.
     *
     * example:
     *
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $consequentialLoss;

    /**
     * Get serviceFormat
     *
     * @return string
     */
    public function getServiceFormat(): string
    {
        return $this->serviceFormat;
    }

    /**
     * Set serviceFormat
     *
     * @param string $serviceFormat
     *
     * @return $this
     */
    public function setServiceFormat(string $serviceFormat): self
    {
        $this->serviceFormat = $serviceFormat;

        return $this;
    }

    /**
     * Get tracked
     *
     * @return bool
     */
    public function getTracked(): bool
    {
        return $this->tracked;
    }

    /**
     * Set tracked
     *
     * @param bool $tracked
     *
     * @return $this
     */
    public function setTracked(bool $tracked): self
    {
        $this->tracked = $tracked;

        return $this;
    }

    /**
     * Get signatureRequired
     *
     * @return bool
     */
    public function getSignatureRequired(): bool
    {
        return $this->signatureRequired;
    }

    /**
     * Set signatureRequired
     *
     * @param bool $signatureRequired
     *
     * @return $this
     */
    public function setSignatureRequired(bool $signatureRequired): self
    {
        $this->signatureRequired = $signatureRequired;

        return $this;
    }

    /**
     * Get safeplace
     *
     * @return bool
     */
    public function getSafeplace(): bool
    {
        return $this->safeplace;
    }

    /**
     * Set safeplace
     *
     * @param bool $safeplace
     *
     * @return $this
     */
    public function setSafeplace(bool $safeplace): self
    {
        $this->safeplace = $safeplace;

        return $this;
    }

    /**
     * Get localCollect
     *
     * @return bool
     */
    public function getLocalCollect(): bool
    {
        return $this->localCollect;
    }

    /**
     * Set localCollect
     *
     * @param bool $localCollect
     *
     * @return $this
     */
    public function setLocalCollect(bool $localCollect): self
    {
        $this->localCollect = $localCollect;

        return $this;
    }

    /**
     * Get saturdayGuaranteed
     *
     * @return bool
     */
    public function getSaturdayGuaranteed(): bool
    {
        return $this->saturdayGuaranteed;
    }

    /**
     * Set saturdayGuaranteed
     *
     * @param bool $saturdayGuaranteed
     *
     * @return $this
     */
    public function setSaturdayGuaranteed(bool $saturdayGuaranteed): self
    {
        $this->saturdayGuaranteed = $saturdayGuaranteed;

        return $this;
    }

    /**
     * Get consequentialLoss
     *
     * @return bool
     */
    public function getConsequentialLoss(): bool
    {
        return $this->consequentialLoss;
    }

    /**
     * Set consequentialLoss
     *
     * @param bool $consequentialLoss
     *
     * @return $this
     */
    public function setConsequentialLoss(bool $consequentialLoss): self
    {
        $this->consequentialLoss = $consequentialLoss;

        return $this;
    }
}
