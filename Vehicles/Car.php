<?php

namespace ParkingSystem\Vehicles;

use ParkingSystem\Parking;

class Car
{
    public function __construct()
    {
        $this->type = VehicleType::Car;
    }

    public function park(Parking $parking): string
    {
        return $parking->parkCar();
    }
}
