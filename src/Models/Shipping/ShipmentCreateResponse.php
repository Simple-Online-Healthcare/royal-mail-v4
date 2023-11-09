<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Response from a create shipment request
 *
 * Required properties: HttpStatusCode, HttpStatusDescription
 */
class ShipmentCreateResponse
{
    /**
     * Consignment Number
     *     - Only populated for services that support Multi-Packages
     *
     * example: FD345678932GB
     * maxLength: 21
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $consignmentNumber;

    /**
     * Consignment Tracking URL
     *     - Only populated for services that support Multi-Packages
     *
     * example: http://carrier.website.com/tracking?number=FD345678932GB
     * maxLength: 250
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $consignmentTrackingUrl;

    /**
     * Packages
     *     - Details each package tracking information and Unique Id.
     *
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\PackageResponse>")
     *
     * @var PackageResponse[]|null
     */
    protected $packages;

    /**
     * Label Image Format
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $labelImageFormat;

    /**
     * Label Images
     *     - Any labels that have been created as a result of the request.
     *     - Depends on Label Image Format.
     *     - **PDF**
     *     - Base 64 encoded PDF
     *     - **PNG**
     *     - Base 64 encoded PNG
     *     - **ZPL 300 / 203 dpi**
     *     - Base 64 encoded PRN (text file)
     *     - **Data stream**
     *     - Not Included - see Packages for Data Stream responses
     *
     * example: AxLjUwLjQwMDAtZ2RpIFwod3d3LnBkZnNoY ... XJwLmNvbVwpKQovUHJvZHVjZXIoUERG
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $labelImages;

    /**
     * Customs Documents
     *     - Base 64 encoded PDF
     *     - Any customs documents that have been created as a result of the request.
     *
     * example: AxLjUwLjQwMDAtZ2RpIFwod3d3LnBkZnNoY ... XJwLmNvbVwpKQovUHJvZHVjZXIoUERG
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $customsDocuments;

    /**
     * Return Label Image Format
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $returnLabelImageFormat;

    /**
     * Return Label Images
     *     - Any return labels that have been created as a result of the request and label option settings.
     *     - Depends on ReturnLabelImageFormat.
     *     - **PDF**
     *     - Base 64 encoded PDF
     *     - **PNG**
     *     - Base 64 encoded PNG
     *     - **ZPL 300 / 203 dpi**
     *     - Base 64 encoded PRN (text file)
     *
     * example: AxLjUwLjQwMDAtZ2RpIFwod3d3LnBkZnNoY ... XJwLmNvbVwpKQovUHJvZHVjZXIoUERG
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $returnLabelImages;

    /**
     * HTTP Status Code
     *
     * example: 200
     * format: int32
     *
     * @JMS\Type("int")
     *
     * @var int
     */
    protected $httpStatusCode;

    /**
     * HTTP Status Description
     *
     * example: OK
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $httpStatusDescription;

    /**
     * Message
     *     - Successful response may include a success message.
     *     - Failure responses will have general reason as to why. Further details may be contained in the list of errors.
     *
     * example: Your item has been created/updated successfully
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $message;

    /**
     * Errors
     *     - Details about why a request failed.
     *
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ErrorDetail>")
     *
     * @var ErrorDetail[]|null
     */
    protected $errors;

    /**
     * Get consignmentNumber
     *
     * @return string|null
     */
    public function getConsignmentNumber(): ?string
    {
        return $this->consignmentNumber;
    }

    /**
     * Set consignmentNumber
     *
     * @param string|null $consignmentNumber
     *
     * @return $this
     */
    public function setConsignmentNumber(?string $consignmentNumber): self
    {
        $this->consignmentNumber = $consignmentNumber;

        return $this;
    }

    /**
     * Get consignmentTrackingUrl
     *
     * @return string|null
     */
    public function getConsignmentTrackingUrl(): ?string
    {
        return $this->consignmentTrackingUrl;
    }

    /**
     * Set consignmentTrackingUrl
     *
     * @param string|null $consignmentTrackingUrl
     *
     * @return $this
     */
    public function setConsignmentTrackingUrl(?string $consignmentTrackingUrl): self
    {
        $this->consignmentTrackingUrl = $consignmentTrackingUrl;

        return $this;
    }

    /**
     * Get packages
     *
     * @return PackageResponse[]|null
     */
    public function getPackages(): ?array
    {
        return $this->packages;
    }

    /**
     * Set packages
     *
     * @param PackageResponse[]|null $packages
     *
     * @return $this
     */
    public function setPackages(?array $packages): self
    {
        $this->packages = $packages;

        return $this;
    }

    /**
     * Add package
     *
     * @var mixed
     *
     * @param mixed $package
     *
     * @return $this
     */
    public function addPackage($package): self
    {
        if (!is_array($this->packages)) {
            $this->packages = [];
        }

        $this->packages[] = $package;

        return $this;
    }

    /**
     * Get labelImageFormat
     *
     * @return string|null
     */
    public function getLabelImageFormat(): ?string
    {
        return $this->labelImageFormat;
    }

    /**
     * Set labelImageFormat
     *
     * @param string|null $labelImageFormat
     *
     * @return $this
     */
    public function setLabelImageFormat(?string $labelImageFormat): self
    {
        $this->labelImageFormat = $labelImageFormat;

        return $this;
    }

    /**
     * Get labelImages
     *
     * @return string|null
     */
    public function getLabelImages(): ?string
    {
        return $this->labelImages;
    }

    /**
     * Set labelImages
     *
     * @param string|null $labelImages
     *
     * @return $this
     */
    public function setLabelImages(?string $labelImages): self
    {
        $this->labelImages = $labelImages;

        return $this;
    }

    /**
     * Get customsDocuments
     *
     * @return string|null
     */
    public function getCustomsDocuments(): ?string
    {
        return $this->customsDocuments;
    }

    /**
     * Set customsDocuments
     *
     * @param string|null $customsDocuments
     *
     * @return $this
     */
    public function setCustomsDocuments(?string $customsDocuments): self
    {
        $this->customsDocuments = $customsDocuments;

        return $this;
    }

    /**
     * Get returnLabelImageFormat
     *
     * @return string|null
     */
    public function getReturnLabelImageFormat(): ?string
    {
        return $this->returnLabelImageFormat;
    }

    /**
     * Set returnLabelImageFormat
     *
     * @param string|null $returnLabelImageFormat
     *
     * @return $this
     */
    public function setReturnLabelImageFormat(?string $returnLabelImageFormat): self
    {
        $this->returnLabelImageFormat = $returnLabelImageFormat;

        return $this;
    }

    /**
     * Get returnLabelImages
     *
     * @return string|null
     */
    public function getReturnLabelImages(): ?string
    {
        return $this->returnLabelImages;
    }

    /**
     * Set returnLabelImages
     *
     * @param string|null $returnLabelImages
     *
     * @return $this
     */
    public function setReturnLabelImages(?string $returnLabelImages): self
    {
        $this->returnLabelImages = $returnLabelImages;

        return $this;
    }

    /**
     * Get httpStatusCode
     *
     * @return int
     */
    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    /**
     * Set httpStatusCode
     *
     * @param int $httpStatusCode
     *
     * @return $this
     */
    public function setHttpStatusCode(int $httpStatusCode): self
    {
        $this->httpStatusCode = $httpStatusCode;

        return $this;
    }

    /**
     * Get httpStatusDescription
     *
     * @return string
     */
    public function getHttpStatusDescription(): string
    {
        return $this->httpStatusDescription;
    }

    /**
     * Set httpStatusDescription
     *
     * @param string $httpStatusDescription
     *
     * @return $this
     */
    public function setHttpStatusDescription(string $httpStatusDescription): self
    {
        $this->httpStatusDescription = $httpStatusDescription;

        return $this;
    }

    /**
     * Get message
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Set message
     *
     * @param string|null $message
     *
     * @return $this
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get errors
     *
     * @return ErrorDetail[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Set errors
     *
     * @param ErrorDetail[]|null $errors
     *
     * @return $this
     */
    public function setErrors(?array $errors): self
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * Add error
     *
     * @var mixed
     *
     * @param mixed $error
     *
     * @return $this
     */
    public function addError($error): self
    {
        if (!is_array($this->errors)) {
            $this->errors = [];
        }

        $this->errors[] = $error;

        return $this;
    }
}
