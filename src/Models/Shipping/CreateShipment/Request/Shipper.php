<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment\Request;

class Shipper
{
    /**
     * @var string
     */
    protected string $shippingAccountId;

    /**
     * @var string
     */
    protected string $reference1;

    /**
     * @var string
     */
    protected string $shippingLocationId;

    /**
     * @return string
     */
    public function getShippingAccountId(): string
    {
        return $this->shippingAccountId;
    }

    /**
     * @param string $shippingAccountId
     *
     * @return $this
     */
    public function setShippingAccountId(string $shippingAccountId): Shipper
    {
        $this->shippingAccountId = $shippingAccountId;

        return $this;
    }

    /**
     * @return string
     */
    public function getReference1(): string
    {
        return $this->reference1;
    }

    /**
     * @param string $reference1
     *
     * @return $this
     */
    public function setReference1(string $reference1): Shipper
    {
        $this->reference1 = $reference1;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingLocationId(): string
    {
        return $this->shippingLocationId;
    }

    /**
     * @param string $shippingLocationId
     *
     * @return Shipper
     */
    public function setShippingLocationId(string $shippingLocationId): Shipper
    {
        $this->shippingLocationId = $shippingLocationId;

        return $this;
    }
}
