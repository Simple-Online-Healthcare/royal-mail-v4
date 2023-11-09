<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Response from a print documents request, containing the documents if the request was successful.
 *
 * Required properties: HttpStatusCode, HttpStatusDescription
 */
class PrintDocumentResponse
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
     * Document Type
     *     - **CN23** - Customs Documents PDF 100mm x 150mm
     *     - **CI** - Commercial Invoice PDF A4 Portrait
     *     - **P** - Proforma PDF A4 Portrait
     *
     * example: CN23
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * Document Image
     *     - Base 64 encoded PDF
     *
     * example: AxLjUwLjQwMDAtZ2RpIFwod3d3LnBkZnNoY ... XJwLmNvbVwpKQovUHJvZHVjZXIoUERG
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $documentImage;

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
     * Get documentType
     *
     * @return string|null
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * Set documentType
     *
     * @param string|null $documentType
     *
     * @return $this
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Get documentImage
     *
     * @return string|null
     */
    public function getDocumentImage(): ?string
    {
        return $this->documentImage;
    }

    /**
     * Set documentImage
     *
     * @param string|null $documentImage
     *
     * @return $this
     */
    public function setDocumentImage(?string $documentImage): self
    {
        $this->documentImage = $documentImage;

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
