<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

class PackageResponse
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected string $labelFormat;

    /**
     * @return string
     */
    public function getLabelFormat(): string
    {
        return $this->labelFormat;
    }
}
