<?php
require_once 'Vehicle.php';

class Fleet {
    //Propiedades Especiales!
    private $name;
    private $vehicles;

    public function __construct($name) {
        $this->name = $name;
        $this->vehicles = [];
    }

    // Funciones
    public function addVehicle($vehicle) {
        $this->vehicles[] = $vehicle;
    }

    public function listVehicles() {
        $output = "<b>Parque Automovilistico</b>: {$this->name}<br><br>";
        foreach ($this->vehicles as $vehicle) {
            $output .= $vehicle->getDetails() . "<br>";
        }
        return $output;
    }

    public function listAvailableVehicles() {
        $output = "<b>Disponibilidad de equipamiento dentro del parque automovilistico:</b> {$this->name}<br><br>";
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->isAvailable()) {
                $output .= $vehicle->getDetails() . "<br>";
            }
        }
        return $output;
    }
}
?>
