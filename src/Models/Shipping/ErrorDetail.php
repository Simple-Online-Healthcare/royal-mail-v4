<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Details about an error
 */
class ErrorDetail
{
    /**
     * Message
     *     - The error message, or issue.
     *
     * example: The first line of the address must be 35 characters or less.
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $message;

    /**
     * Cause
     *     - The cause of the error.
     *
     * example: DestinationAddressLine1
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $cause;

    /**
     * Error Code
     *     - The error code for this error.
     *     - **E1431** - System error
     *     - **E1432** - Required field
     *     - **E1433** - Invalid field
     *     - **E1434** - Invalid action
     *     - **E1435** - Item not found
     *
     * example: E1433
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $errorCode;

    /**
     * Error Log Id
     *     - The associated Error Log Id if exists.
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $errorId;

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get cause
     *
     * @return string
     */
    public function getCause(): string
    {
        return $this->cause;
    }

    /**
     * Set cause
     *
     * @param string $cause
     *
     * @return $this
     */
    public function setCause(string $cause): self
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * Get errorCode
     *
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * Set errorCode
     *
     * @param string $errorCode
     *
     * @return $this
     */
    public function setErrorCode(string $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * Get errorId
     *
     * @return string
     */
    public function getErrorId(): string
    {
        return $this->errorId;
    }

    /**
     * Set errorId
     *
     * @param string $errorId
     *
     * @return $this
     */
    public function setErrorId(string $errorId): self
    {
        $this->errorId = $errorId;

        return $this;
    }
}
