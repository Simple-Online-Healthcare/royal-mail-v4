<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;
use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability\Option;

/**
 * Response from a Service Availabilty Request
 *
 * Required properties: HttpStatusCode, HttpStatusDescription
 */
class ServiceAvailabilityResponse
{
    /**
     * Weight Unit of Measure
     *     - The unit of measure used for the Max Weights.
     *     - Will be the same as the Weight Unit of Measure received.
     *
     * @JMS\Type("string")
     *
     * @var string|null
     */
    protected $weightUnitOfMeasure;

    /**
     * Service Options
     *     - The available service options that can be used for the details provided.
     *     - Populated for successful responses only.
     *
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\ServiceAvailability\Option>")
     *
     * @var Option[]|null
     */
    protected $options;

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
     * Get weightUnitOfMeasure
     *
     * @return string|null
     */
    public function getWeightUnitOfMeasure(): ?string
    {
        return $this->weightUnitOfMeasure;
    }

    /**
     * Set weightUnitOfMeasure
     *
     * @param string|null $weightUnitOfMeasure
     *
     * @return $this
     */
    public function setWeightUnitOfMeasure(?string $weightUnitOfMeasure): self
    {
        $this->weightUnitOfMeasure = $weightUnitOfMeasure;

        return $this;
    }

    /**
     * Get options
     *
     * @return Option[]|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * Set options
     *
     * @param Option[]|null $options
     *
     * @return $this
     */
    public function setOptions(?array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Add option
     *
     * @var mixed
     *
     * @param mixed $option
     *
     * @return $this
     */
    public function addOption($option): self
    {
        if (!is_array($this->options)) {
            $this->options = [];
        }

        $this->options[] = $option;

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
