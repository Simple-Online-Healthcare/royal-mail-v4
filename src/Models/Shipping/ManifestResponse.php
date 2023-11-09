<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping;

use JMS\Serializer\Annotation as JMS;

/**
 * Response from a create manifest request
 *
 * Required properties: PostingLocation, HttpStatusCode, HttpStatusDescription
 */
class ManifestResponse
{
    /**
     * Posting Location.
     *     - The Posting Location manifested
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
     * The Created Manifests
     *     - Only populated if the request was successful.
     *
     * @JMS\Type("array<SimpleOnlineHealthcare\RoyalMail\Models\Shipping\Manifest>")
     *
     * @var Manifest[]|null
     */
    protected $manifests;

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

    /**
     * Get manifests
     *
     * @return Manifest[]|null
     */
    public function getManifests(): ?array
    {
        return $this->manifests;
    }

    /**
     * Set manifests
     *
     * @param Manifest[]|null $manifests
     *
     * @return $this
     */
    public function setManifests(?array $manifests): self
    {
        $this->manifests = $manifests;

        return $this;
    }

    /**
     * Add manifest
     *
     * @var mixed
     *
     * @param mixed $manifest
     *
     * @return $this
     */
    public function addManifest($manifest): self
    {
        if (!is_array($this->manifests)) {
            $this->manifests = [];
        }

        $this->manifests[] = $manifest;

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
