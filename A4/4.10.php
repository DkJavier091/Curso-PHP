<?php
require_once 'Clases/Vehicle.php';
require_once 'Clases/Fleet.php';

// Crear vehículos
$vehiculo1 = new Vehicle("Mercedes", "Z", "1234ABC", false);
$vehiculo2 = new Vehicle("Smart", "Y", "5678QWE", false);
$vehiculo3 = new Vehicle("Testla", "X", "9876RTY", true);

// Crear el concesionario de vehículos
$fleet = new Fleet("CURRO E HIJOS");

// Agregar vehículos al parque
$fleet->addVehicle($vehiculo1);
$fleet->addVehicle($vehiculo2);
$fleet->addVehicle($vehiculo3);

?>

<?php include 'includes/header.php'; ?>
<h1>Información del Parque</h1>
<h2>Listado de vehículos en disponibilidad:</h2>
<?= $fleet->listVehicles(); ?>

<br><br>

<h2>Vehículos con disponibilidad de entrada:</h2>
<?= $fleet->listAvailableVehicles(); ?>

<?php include 'includes/footer.php'; ?>

