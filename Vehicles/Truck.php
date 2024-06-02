<?php

namespace ParkingSystem\Vehicles;

use ParkingSystem\Database;

class Truck
{
    public function logParking($result)
    {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("INSERT INTO TruckParkingLogs (result) VALUES (:result)");
        $stmt->execute(['result' => $result]);
    }
}
