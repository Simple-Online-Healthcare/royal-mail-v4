<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment;

use SimpleOnlineHealthcare\RoyalMail\Models\Shipping\Address;

class Destination
{
    /**
     * @var Address
     */
    protected Address $address;

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     *
     * @return $this
     */
    public function setAddress(Address $address): Destination
    {
        $this->address = $address;

        return $this;
    }
}
