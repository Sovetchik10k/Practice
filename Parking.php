<?php

namespace ParkingSystem;

use ParkingSystem\Vehicles\Car;
use ParkingSystem\Vehicles\Truck;

class Parking
{
    private $floors;
    private $availableSpaces;
    private $db;

    public function __construct(array $availableSpaces, Database $db)
    {
        $this->floors = count($availableSpaces);
        $this->availableSpaces = $availableSpaces;
        $this->db = $db;
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

    public function logParking($vehicleType, $result)
    {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("INSERT INTO ParkingLogs (vehicle_type, result) VALUES (:vehicle_type, :result)");
        $result = $stmt->execute(['vehicle_type' => $vehicleType, 'result' => $result]);
    }
}
