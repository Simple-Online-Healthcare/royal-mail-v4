<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Response from a print label request, containing the label if the request was successful.
 *
 * Required properties: HttpStatusCode, HttpStatusDescription
 */
class PrintLabelResponse
{
    /**
     * Shipment Id
     *     - Tracking Number or Unique Id of the shipment involved.
     *
     * example: 3A01234561234568AE7C7
     * minLength: 13
     * maxLength: 21
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $shipmentId;

    /**
     * Label Image
     *     - Depends on Label Image Format
     *     - **PDF**
     *     - Base 64 encoded PDF
     *     - **PNG**
     *     - Base 64 encoded PNG
     *     - **ZPL 300 / 203 dpi**
     *     - Base 64 encoded PRN (text file)
     *     - **Data stream**
     *     - Not Included
     *
     * example: AxLjUwLjQwMDAtZ2RpIFwod3d3LnBkZnNoY ... XJwLmNvbVwpKQovUHJvZHVjZXIoUERG
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $labelImage;

    /**
     * Label Image Format
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $labelImageFormat;

    /**
     * Shipment Tracking Number
     *     - Final Mile carrier tracking number
     *
     * example: HF123456783GB
     * minLength: 13
     * maxLength: 13
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $trackingNumber;

    /**
     * Unique Shipment ID
     *
     * example: 3A01234561234568AE7C7
     * minLength: 21
     * maxLength: 21
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $uniqueId;

    /**
     * Tracking URL
     *     - Final Mile Tracking, if available
     *
     * example: http://carrier.website.com/tracking?number=HF123456783GB
     * maxLength: 250
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $trackingUrl;

    /**
     * Carrier Code
     *     - The allocated carrier.
     *
     * example: RMG
     * maxLength: 4
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $carrierCode;

    /**
     * Primary 2D Barcode Image
     *     - Only populated for Data Stream response.
     *     - Base64 Encoded PNG Image of the 2D data matrix barcode.
     *
     * example: iVBORw0KGgoAAAANSUhE ... UgAAAGgAAABoAQMAAAAn0ifiAAAA
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $primary2DBarcodeImage;

    /**
     * Primary 2D Barcode Data - Base 64 Encoded
     *     - Only populated for Data Stream response.
     *     - Data required to create your own 2D data matrix barcode. Please decode before use.
     *
     * example: iVBORw0KGgoAAAANSUhE ... UgAAAGgAAABoAQMAAAAn0ifiAAAA
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $primary2DBarcodeData;

    /**
     * Formatted Unique Id
     *     - Only populated for Data Stream response.
     *     - Label for 2D data matrix barcode.
     *
     * example: 3A-070 338 6001-000 0B2 000
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $formattedUniqueId;

    /**
     * High Volume Barcode Data
     *     - Only populated for Data Stream response where the service requires the barcode on the label.
     *     - Data required to create your own High Volume barcode.
     *
     * example: *SW115QZ*
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $highVolumeBarcodeData;

    /**
     * High Volume Barcode Image
     *     - Only populated for Data Stream response where the service requires the barcode on the label.
     *     - Base64 Encoded PNG Image of the High Volume barcode.
     *
     * example: iVBORw0KGgoAAAANSUhE ... UgAAAGgAAABoAQMAAAAn0ifiAAAA
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $highVolumeBarcodeImage;

    /**
     * High Volume Sort Code
     *     - Only populated for Data Stream response where the service requires the sort code on the label.
     *
     * example: Q26
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $highVolumeSortCode;

    /**
     * Primary 1D Barcode Data
     *     - Only populated for Data Stream response where the service requires the barcode on the label.
     *     - Data required to create your own 1D barcode.
     *
     * example: HF123456783GB
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $primary1DBarcodeData;

    /**
     * Primary 1D Barcode Image
     *     - Only populated for Data Stream response where the service requires the barcode on the label.
     *     - Base64 Encoded PNG Image of the 1D barcode.
     *
     * example: iVBORw0KGgoAAAANSUhE ... UgAAAGgAAABoAQMAAAAn0ifiAAAA
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $primary1DBarcodeImage;

    /**
     * Return Label Image Format
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $returnLabelImageFormat;

    /**
     * Return Label Image
     *     - Any return label that have been created as a result of the request and label option settings.
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
    protected $returnLabelImage;

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
     * Get shipmentId
     *
     * @return string|null
     */
    public function getShipmentId(): ?string
    {
        return $this->shipmentId;
    }

    /**
     * Set shipmentId
     *
     * @param string|null $shipmentId
     *
     * @return $this
     */
    public function setShipmentId(?string $shipmentId): self
    {
        $this->shipmentId = $shipmentId;

        return $this;
    }

    /**
     * Get labelImage
     *
     * @return string|null
     */
    public function getLabelImage(): ?string
    {
        return $this->labelImage;
    }

    /**
     * Set labelImage
     *
     * @param string|null $labelImage
     *
     * @return $this
     */
    public function setLabelImage(?string $labelImage): self
    {
        $this->labelImage = $labelImage;

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
     * Get trackingNumber
     *
     * @return string|null
     */
    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * Set trackingNumber
     *
     * @param string|null $trackingNumber
     *
     * @return $this
     */
    public function setTrackingNumber(?string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    /**
     * Get uniqueId
     *
     * @return string|null
     */
    public function getUniqueId(): ?string
    {
        return $this->uniqueId;
    }

    /**
     * Set uniqueId
     *
     * @param string|null $uniqueId
     *
     * @return $this
     */
    public function setUniqueId(?string $uniqueId): self
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    /**
     * Get trackingUrl
     *
     * @return string|null
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    /**
     * Set trackingUrl
     *
     * @param string|null $trackingUrl
     *
     * @return $this
     */
    public function setTrackingUrl(?string $trackingUrl): self
    {
        $this->trackingUrl = $trackingUrl;

        return $this;
    }

    /**
     * Get carrierCode
     *
     * @return string|null
     */
    public function getCarrierCode(): ?string
    {
        return $this->carrierCode;
    }

    /**
     * Set carrierCode
     *
     * @param string|null $carrierCode
     *
     * @return $this
     */
    public function setCarrierCode(?string $carrierCode): self
    {
        $this->carrierCode = $carrierCode;

        return $this;
    }

    /**
     * Get primary2DBarcodeImage
     *
     * @return string|null
     */
    public function getPrimary2DBarcodeImage(): ?string
    {
        return $this->primary2DBarcodeImage;
    }

    /**
     * Set primary2DBarcodeImage
     *
     * @param string|null $primary2DBarcodeImage
     *
     * @return $this
     */
    public function setPrimary2DBarcodeImage(?string $primary2DBarcodeImage): self
    {
        $this->primary2DBarcodeImage = $primary2DBarcodeImage;

        return $this;
    }

    /**
     * Get primary2DBarcodeData
     *
     * @return string|null
     */
    public function getPrimary2DBarcodeData(): ?string
    {
        return $this->primary2DBarcodeData;
    }

    /**
     * Set primary2DBarcodeData
     *
     * @param string|null $primary2DBarcodeData
     *
     * @return $this
     */
    public function setPrimary2DBarcodeData(?string $primary2DBarcodeData): self
    {
        $this->primary2DBarcodeData = $primary2DBarcodeData;

        return $this;
    }

    /**
     * Get formattedUniqueId
     *
     * @return string|null
     */
    public function getFormattedUniqueId(): ?string
    {
        return $this->formattedUniqueId;
    }

    /**
     * Set formattedUniqueId
     *
     * @param string|null $formattedUniqueId
     *
     * @return $this
     */
    public function setFormattedUniqueId(?string $formattedUniqueId): self
    {
        $this->formattedUniqueId = $formattedUniqueId;

        return $this;
    }

    /**
     * Get highVolumeBarcodeData
     *
     * @return string|null
     */
    public function getHighVolumeBarcodeData(): ?string
    {
        return $this->highVolumeBarcodeData;
    }

    /**
     * Set highVolumeBarcodeData
     *
     * @param string|null $highVolumeBarcodeData
     *
     * @return $this
     */
    public function setHighVolumeBarcodeData(?string $highVolumeBarcodeData): self
    {
        $this->highVolumeBarcodeData = $highVolumeBarcodeData;

        return $this;
    }

    /**
     * Get highVolumeBarcodeImage
     *
     * @return string|null
     */
    public function getHighVolumeBarcodeImage(): ?string
    {
        return $this->highVolumeBarcodeImage;
    }

    /**
     * Set highVolumeBarcodeImage
     *
     * @param string|null $highVolumeBarcodeImage
     *
     * @return $this
     */
    public function setHighVolumeBarcodeImage(?string $highVolumeBarcodeImage): self
    {
        $this->highVolumeBarcodeImage = $highVolumeBarcodeImage;

        return $this;
    }

    /**
     * Get highVolumeSortCode
     *
     * @return string|null
     */
    public function getHighVolumeSortCode(): ?string
    {
        return $this->highVolumeSortCode;
    }

    /**
     * Set highVolumeSortCode
     *
     * @param string|null $highVolumeSortCode
     *
     * @return $this
     */
    public function setHighVolumeSortCode(?string $highVolumeSortCode): self
    {
        $this->highVolumeSortCode = $highVolumeSortCode;

        return $this;
    }

    /**
     * Get primary1DBarcodeData
     *
     * @return string|null
     */
    public function getPrimary1DBarcodeData(): ?string
    {
        return $this->primary1DBarcodeData;
    }

    /**
     * Set primary1DBarcodeData
     *
     * @param string|null $primary1DBarcodeData
     *
     * @return $this
     */
    public function setPrimary1DBarcodeData(?string $primary1DBarcodeData): self
    {
        $this->primary1DBarcodeData = $primary1DBarcodeData;

        return $this;
    }

    /**
     * Get primary1DBarcodeImage
     *
     * @return string|null
     */
    public function getPrimary1DBarcodeImage(): ?string
    {
        return $this->primary1DBarcodeImage;
    }

    /**
     * Set primary1DBarcodeImage
     *
     * @param string|null $primary1DBarcodeImage
     *
     * @return $this
     */
    public function setPrimary1DBarcodeImage(?string $primary1DBarcodeImage): self
    {
        $this->primary1DBarcodeImage = $primary1DBarcodeImage;

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
     * Get returnLabelImage
     *
     * @return string|null
     */
    public function getReturnLabelImage(): ?string
    {
        return $this->returnLabelImage;
    }

    /**
     * Set returnLabelImage
     *
     * @param string|null $returnLabelImage
     *
     * @return $this
     */
    public function setReturnLabelImage(?string $returnLabelImage): self
    {
        $this->returnLabelImage = $returnLabelImage;

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
