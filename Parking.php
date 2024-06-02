<?php

namespace ParkingSystem;

use ParkingSystem\Vehicles\Car;
use ParkingSystem\Vehicles\Truck;

class Parking
{
    private $floors;
    private $availableSpaces;

    public function __construct(array $availableSpaces)
    {
        $this->floors = count($availableSpaces);
        $this->availableSpaces = $availableSpaces;
    }

    public function parkVehicle($vehicle): string
    {
        if ($vehicle instanceof Car) {
            return $this->parkCar();
        } elseif ($vehicle instanceof Truck) {
            return $this->parkTruck();
        }
        return 'Invalid vehicle type';
    }

    public function parkCar(): string
    {
        for ($i = $this->floors - 1; $i >= 0; $i--) {
            if ($this->availableSpaces[$i] > 0) {
                $this->availableSpaces[$i]--;
                return 'y';
            }
        }
        return 'n';
    }

    public function parkTruck(): string
    {
        if ($this->availableSpaces[0] > 0) {
            $this->availableSpaces[0]--;
            return 'y';
        } else {
            return 'n';
        }
    }
}
