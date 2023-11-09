<?php

namespace SimpleOnlineHealthcare\RoyalMail\Exceptions;

use Psr\Http\Message\ResponseInterface;
use Throwable;

class RequestFailedException extends BaseException
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var object|null
     */
    protected $responseModel;

    /**
     * RequestFailedException constructor.
     *
     * @param ResponseInterface $response
     * @param Throwable|null    $previous
     */
    public function __construct(ResponseInterface $response, ?Throwable $previous = null)
    {
        $this->response = $response;

        parent::__construct((string) $response->getBody(), $response->getStatusCode(), $previous);
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @return object|null
     */
    public function getResponseModel(): ?object
    {
        return $this->responseModel;
    }

    /**
     * @param object|null $responseModel
     *
     * @return RequestFailedException
     */
    public function setResponseModel(?object $responseModel): RequestFailedException
    {
        $this->responseModel = $responseModel;

        return $this;
    }
}
