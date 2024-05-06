<?php 
    namespace ParkingSystem;
   
   class Parking
   {
       private $floors;
       private $availableSpaces;
   
       public function __construct(array $availableSpaces)
       {
           $this->floors = count($availableSpaces);
           $this->availableSpaces = $availableSpaces;
       }
   
       public function park(array $vehicles): array
       {
           $result = [];
           foreach ($vehicles as $vehicle) {
               $result[] = $this->parkVehicle($vehicle);
           }
           return $result;
       }
   
       private function parkVehicle(string $vehicle): string
       {
        if ($vehicle === 't') {
            return $this->parkTruck();
        } else {
            return $this->parkCar();
        }
       }
   
       private function parkCar(): string
       {
           for ($i = 0; $i < $this->floors; $i++) {
               if ($this->availableSpaces[$i] > 0) {
                   $this->availableSpaces[$i]--;
                   return 'y';
               }
           }
           return 'n';
       }
   
       private function parkTruck(): string
       {
           if ($this->availableSpaces[0] > 0) {
               $this->availableSpaces[0]--;
               return 'y';
           } else {
               return 'n';
           }
       }
   }
   
   $parking = new Parking([1, 1, 1]);
   $vehicles = ['t', 'c', 'c', 'c'];
   
   $result = $parking->park($vehicles);
   
   echo implode(' ', $result); // Выводит: y y y n
   
   
    ?>