<?php

namespace SimpleOnlineHealthcare\RoyalMail\Models\Shipping\CreateShipment;

class ShipmentPackage
{
    public const PACKAGE_TYPE_PARCEL = 'Parcel';

    /**
     * @var string
     */
    protected string $packageType = self::PACKAGE_TYPE_PARCEL;

    /**
     * @var string
     */
    protected string $declaredWeight;

    /**
     * @return string
     */
    public function getPackageType(): string
    {
        return $this->packageType;
    }

    /**
     * @param string $packageType
     * @return ShipmentPackage
     */
    public function setPackageType(string $packageType): ShipmentPackage
    {
        $this->packageType = $packageType;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeclaredWeight(): string
    {
        return $this->declaredWeight;
    }

    /**
     * @param string $declaredWeight
     *
     * @return ShipmentPackage
     */
    public function setDeclaredWeight(string $declaredWeight): ShipmentPackage
    {
        $this->declaredWeight = $declaredWeight;

        return $this;
    }
}
