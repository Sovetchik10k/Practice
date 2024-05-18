<?php

require_once 'Parking.php';
require_once 'Vehicles/VehicleType.php';
require_once 'Vehicles/Car.php';
require_once 'Vehicles/Truck.php';

use ParkingSystem\Parking;
use ParkingSystem\Vehicles\Car;
use ParkingSystem\Vehicles\Truck;

$parking = new Parking([1, 2, 3]);
$vehicles = [new Car(), new Car(), new Truck(), new Car()];

$result = [];
foreach ($vehicles as $vehicle) {
    $result[] = $vehicle->park($parking);
}

echo implode(' ', $result); // Ожидаемый вывод: y y y y
