<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * A request to manifest all shipments ready to manifest for a single posting location.
 *
 * Required properties: PostingLocation
 */
class ManifestRequest
{
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
}
