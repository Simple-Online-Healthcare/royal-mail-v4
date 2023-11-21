<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Serialization;

use Illuminate\Support\Str;
use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;

class StudlyPropertyNamingStrategy implements PropertyNamingStrategyInterface
{
    /**
     * @param PropertyMetadata $property
     * @return string
     */
    public function translateName(PropertyMetadata $property): string
    {
        return Str::studly($property->name);
    }
}
