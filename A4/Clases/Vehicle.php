<?php
class Vehicle {
    private $make;
    private $model;
    private $licensePlate;
    private $available;


    public function __construct($marca, $modelo, $matricula, $disponibilidad) {
        $this->make = $marca;
        $this->model = $modelo;
        $this->licensePlate = $matricula;
        $this->available = $disponibilidad;
    }

    //Getters
    public function getDetails() {

        return "Marca: {$this->make}" ."<br>".
            "|| Modelo: {$this->model}" ."<br>".
            "|| Matrícula: {$this->licensePlate}" ."<br>".
            "|| Disponible: " . ($this->available ? 'Sí' : 'No');
    }
    //Funciones
    public function isAvailable() {
        return $this->available;
    }
}
?>
