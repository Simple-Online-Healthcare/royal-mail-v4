<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Request;

class CarrierSpecifics
{
    /**
     * @var ServiceEnhancement[]
     */
    protected array $serviceEnhancements = [];

    /**
     * @return ServiceEnhancement[]
     */
    public function getServiceEnhancements(): array
    {
        return $this->serviceEnhancements;
    }

    /**
     * @param ServiceEnhancement $serviceEnhancement
     *
     * @return self
     */
    public function addServiceEnhancement(ServiceEnhancement $serviceEnhancement): self
    {
        $this->serviceEnhancements[] = $serviceEnhancement;

        return $this;
    }
}
