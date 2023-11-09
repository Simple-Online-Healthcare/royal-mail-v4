<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * A request to print a document for a shipment
 *
 * Required properties: DocumentType
 */
class PrintDocumentRequest
{
    /**
     * Document Type
     *     - What document you would like printed
     *     - **CN23** - Customs Documents PDF 100mm x 150mm
     *     - **CI** - Commercial Invoice PDF A4 Portrait
     *     - **P** - Proforma PDF A4 Portrait
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $documentType;

    /**
     * Silent Print Profile
     *     - If present, resulting documents will be printed using this profile.
     *
     * example: 75b59db8-3cd3-4578-888e-54be016f07cc
     * format: uuid
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $silentPrintProfile;

    /**
     * Get documentType
     *
     * @return string
     */
    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    /**
     * Set documentType
     *
     * @param string $documentType
     *
     * @return $this
     */
    public function setDocumentType(string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Get silentPrintProfile
     *
     * @return string|null
     */
    public function getSilentPrintProfile(): ?string
    {
        return $this->silentPrintProfile;
    }

    /**
     * Set silentPrintProfile
     *
     * @param string|null $silentPrintProfile
     *
     * @return $this
     */
    public function setSilentPrintProfile(?string $silentPrintProfile): self
    {
        $this->silentPrintProfile = $silentPrintProfile;

        return $this;
    }
}
