<?php

# Página 99
// Crear objetos DateTime con zonas horarias específicas
$zonaNuevaYork = new DateTimeZone('America/New_York');
$zonaTokio = new DateTimeZone('Asia/Tokyo');
$zonaLocal = new DateTimeZone('Europe/Madrid');

$fechaEvento = new DateTime('2025-06-15 15:00:00', $zonaLocal);

// Clonar la fecha para cada zona horaria
$eventoNY = clone $fechaEvento;
$eventoTokio = clone $fechaEvento;

// Ajustar las fechas a sus respectivas zonas horarias
$eventoNY->setTimezone($zonaNuevaYork);
$eventoTokio->setTimezone($zonaTokio);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de Zonas Horarias</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="../recursos/estilos/styles.css" rel="stylesheet">
</head>
<body>
    <div class="page">
        <header>
            <a href="evento.php"><img src="../recursos/imagenes/logo.png" alt="Logo Evento" height="90"></a>
            <p><b>Evento en Madrid:</b> <?= $fechaEvento->format('d/m/Y H:i') ?> (Hora local)</p>
            <p><b>Evento en Nueva York:</b> <?= $eventoNY->format('d/m/Y H:i') ?> (EST)</p>
            <p><b>Evento en Tokio:</b> <?= $eventoTokio->format('d/m/Y H:i') ?> (JST)</p>
        </header>
        <footer>&copy; <?php echo date('Y'); ?></footer>
    </div>
</body>
</html>