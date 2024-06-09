<?php

require_once 'Parking.php';
require_once 'Database.php';
require_once 'Vehicles/VehicleType.php';
require_once 'Vehicles/Car.php';
require_once 'Vehicles/Truck.php';

use ParkingSystem\Parking;
use ParkingSystem\Database;
use ParkingSystem\Vehicles\Car;
use ParkingSystem\Vehicles\Truck;

$database = new Database();

$availableSpaces = [1, 2, 3];

$parking = new Parking($availableSpaces);

$vehicles = [new Car(), new Car(), new Truck(), new Truck()];

$result = [];
foreach ($vehicles as $vehicle) {
    $parkingResult = $parking->parkVehicle($vehicle);
    $vehicle->logParking($parkingResult);
    $result[] = $parkingResult;
}

echo implode(' ', $result);
