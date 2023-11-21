<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Exceptions;

use Exception;
use Throwable;

abstract class BaseException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [$this->code]: $this->message\n";
    }
}
