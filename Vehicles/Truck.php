<?php

namespace ParkingSystem\Vehicles;

use ParkingSystem\Parking;

class Truck
{
    public function __construct()
    {
        $this->type = VehicleType::Truck;
    }

    public function park(Parking $parking): string
    {
        return $parking->parkTruck();
    }
}
