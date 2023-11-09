<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * A request to print a label
 */
class PrintLabelRequest
{
    const LABEL_FORMAT_PDF = 'PDF';
    const LABEL_FORMAT_PNG = 'PNG';
    const LABEL_FORMAT_DATASTREAM = 'DATASTREAM';
    const LABEL_FORMAT_ZPL203DPI = 'ZPL203DPI';
    const LABEL_FORMAT_ZPL300DPI = 'ZPL300DPI';

    /**
     * Requested Label Format
     *     - *DATASTREAM is only available if it has been activated on your account.*
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $labelFormat;

    /**
     * Silent Print Profile
     *     - If present, resulting labels will be printed using this profile.
     *
     * example: 75b59db8-3cd3-4578-888e-54be016f07cc
     * format: uuid
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $silentPrintProfile;

    /**
     * Get labelFormat
     *
     * @return string
     */
    public function getLabelFormat(): string
    {
        return $this->labelFormat;
    }

    /**
     * Set labelFormat
     *
     * @param string $labelFormat
     *
     * @return $this
     */
    public function setLabelFormat(string $labelFormat): self
    {
        $this->labelFormat = $labelFormat;

        return $this;
    }

    /**
     * Get silentPrintProfile
     *
     * @return string
     */
    public function getSilentPrintProfile(): string
    {
        return $this->silentPrintProfile;
    }

    /**
     * Set silentPrintProfile
     *
     * @param string $silentPrintProfile
     *
     * @return $this
     */
    public function setSilentPrintProfile(string $silentPrintProfile): self
    {
        $this->silentPrintProfile = $silentPrintProfile;

        return $this;
    }
}
