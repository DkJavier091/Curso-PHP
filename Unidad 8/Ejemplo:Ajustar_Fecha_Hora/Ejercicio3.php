<?php

# Página 65
// Crear el evento con la fecha inicial
$evento = DateTime::createFromFormat('d/m/Y H:i:s', '16/10/2024 15:30:00');

// Cambiar la fecha del evento utilizando setDate()
$cambiarFechaEvento = function (DateTime $evento, int $anio, int $mes, int $dia) {
    $evento->setDate($anio, $mes, $dia);
};

// Cambiar la hora del evento utilizando setTime()
$cambiarHoraEvento = function (DateTime $evento, int $hora, int $minuto, int $segundo) {
    $evento->setTime($hora, $minuto, $segundo);
};

// Ajustar la fecha del evento a partir de un timestamp UNIX utilizando setTimestamp()
$ajustarFechaTimestamp = function (DateTime $evento, int $timestamp) {
    $evento->setTimestamp($timestamp);
};

// Modificar la fecha del evento utilizando modify()
$modificarFechaEvento = function (DateTime $evento, string $modificacion) {
    $evento->modify($modificacion);
};

// Aplicación de cambios
$cambiarFechaEvento($evento, 2025, 11, 20); // Cambiar la fecha al 20/11/2025
$cambiarHoraEvento($evento, 18, 45, 0); // Cambiar la hora a las 18:45:00
$ajustarFechaTimestamp($evento, strtotime('2025-12-15 10:00:00')); // Ajustar a una fecha UNIX
$modificarFechaEvento($evento, '+3 days 2 hours'); // Sumar 3 días y 2 horas

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuste de Fecha del Evento</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="../recursos/estilos/styles.css" rel="stylesheet">
</head>
<body>
    <div class="page">
        <header>
            <a href="evento.php"><img src="../recursos/imagenes/logo.png" alt="Logo Evento" height="90"></a>
            <p><b>Fecha del Evento:</b> <?= $evento->format('d/m/Y H:i:s') ?></p>
            <p><b>Timestamp del Evento:</b> <?= $evento->getTimestamp() ?></p>
            <p><b>Fecha escrita:</b> <?= $evento->format('j \d\e F \d\e Y, H:i') ?></p>
        </header>
        <footer>&copy; <?php echo date('Y'); ?></footer>
    </div>
</body>
</html>