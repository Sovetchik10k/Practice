<?php

namespace ParkingSystem\Vehicles;

use ParkingSystem\Database;

class Car
{
    public function logParking($result)
    {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("INSERT INTO CarParkingLogs (result) VALUES (:result)");
        $stmt->execute(['result' => $result]);
    }
}
