<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Response from a cancel shipment request
 *
 * Required properties: HttpStatusCode, HttpStatusDescription
 */
class ShipmentsCancelResponse
{
    /**
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected ?string $message = null;

    /**
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ErrorDetail>")
     *
     * @var ErrorDetail[]|null
     */
    protected ?array $errors = null;

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
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
     * @return ErrorDetail[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
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
     * @param ErrorDetail $error
     *
     * @return $this
     */
    public function addError(ErrorDetail $error): self
    {
        if (!is_array($this->errors)) {
            $this->errors = [];
        }

        $this->errors[] = $error;

        return $this;
    }
}
