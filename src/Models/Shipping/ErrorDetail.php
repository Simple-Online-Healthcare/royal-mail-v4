<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

class ErrorDetail
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected string $message;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected string $cause;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected string $errorCode;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected string $errorId;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
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
     * @return string
     */
    public function getCause(): string
    {
        return $this->cause;
    }

    /**
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
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
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
     * @return string
     */
    public function getErrorId(): string
    {
        return $this->errorId;
    }

    /**
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
