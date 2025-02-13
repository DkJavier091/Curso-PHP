<?php

# Páginas 88, 90 y 91
// Crear un evento inicial con una fecha y hora dadas
$fechaInicio = new DateTime('2025-03-01 09:00:00');

// Definir un intervalo de repetición (cada 7 días)
$intervalo = new DateInterval('P7D');

// Definir la cantidad de repeticiones (2 meses = 8 semanas aprox.)
$fechaFin = new DateTime('2025-05-01');
$periodo = new DatePeriod($fechaInicio, $intervalo, $fechaFin);

// Duración del evento en días, horas y minutos
$duracionEvento = new DateInterval('P1DT3H45M'); // 1 día, 3 horas, 45 minutos

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos Recurrentes</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="../recursos/estilos/styles.css" rel="stylesheet">
</head>
<body>
    <div class="page">
        <header>
            <a href="evento.php"><img src="../recursos/imagenes/logo.png" alt="Logo Evento" height="90"></a>
            <p><b>Eventos programados:</b></p>
            <ul>
                <?php foreach ($periodo as $evento): ?>
                    <?php $finEvento = clone $evento;
                    $finEvento->add($duracionEvento); ?>
                    <li><?= $evento->format('d/m/Y H:i') ?> - <?= $finEvento->format('d/m/Y H:i') ?></li>
                <?php endforeach; ?>
            </ul>
        </header>
        <footer>&copy; <?php echo date('Y'); ?></footer>
    </div>
</body>
</html>
