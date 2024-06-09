<?php

namespace ParkingSystem\Vehicles;

use ParkingSystem\Database;

class Truck
{
    private $vehicleId;

    public function __construct()
    {
        $this->vehicleId = 2; // ID для типа 'truck'
    }

    public function logParking($result)
    {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("INSERT INTO ParkingLogs (vehicle_id, result) VALUES (:vehicle_id, :result)");
        $stmt->execute(['vehicle_id' => $this->vehicleId, 'result' => $result]);
    }
}
