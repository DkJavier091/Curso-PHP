<?php

# Página 79
// Crear las fechas de inicio y fin del evento
$fechaInicio = new DateTime('2025-07-10 14:00:00');
$fechaFin = new DateTime('2025-07-12 17:30:00');

// Calcular la duración total del evento
$duracion = $fechaInicio->diff($fechaFin);

// Calcular el total de horas y minutos del evento
$decimal_time = ($duracion->days * 24) + $duracion->h + ($duracion->i / 60);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duración del Evento</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="../recursos/estilos/styles.css" rel="stylesheet">
</head>
<body>
    <div class="page">
        <header>
            <a href="evento.php"><img src="../recursos/imagenes/logo.png" alt="Logo Evento" height="90"></a>
            <p><b>Duración del evento:</b> <?= $duracion->format('%d días, %h horas, %i minutos') ?></p>
            <p><b>Tiempo total:</b> <?= number_format($decimal_time, 2) ?> horas</p>
        </header>
        <footer>&copy; <?php echo date('Y'); ?></footer>
    </div>
</body>
</html>
