<?php

#Página 39
// Obtener fechas por formato UNIX..
$obtenerFechaInicioTimestamp = fn () => strtotime('January 1 2021');
$obtenerFechaFinalTimestamp = fn () => mktime(0, 0, 0, 2, 1, 2001);

// Formatear fechas de formato UNIX a fecha actual..
$obtenerFechaInicioFormateada = fn () => date('l, d M Y', $obtenerFechaInicioTimestamp());
$obtenerFechaFinalizacionFormateada = fn () => date('l, d M Y', $obtenerFechaFinalTimestamp());

// Parte 1 de la actividad
// Genera la fecha actual en formato UNIX -> formatea la fecha UNIX pasada por parametro a fecha actual en formato..
$obtenerTimestampActual = fn () => time(); #Fecha en formato Unix (1970 calculada en segundos.)
$formateoFecha = fn ($fechaUnix) => date('d-m-Y H:i', $fechaUnix); #Toma una fecha UNIX por parametro y la formatea..

function obtenerFechaActual(callable $obtenerTimestampActual, callable $formateoFecha): string
{
    $timestamp = $obtenerTimestampActual();
    $fechaFormateada = $formateoFecha($timestamp);

    return $fechaFormateada;
}

// Parte 2 de la actividad
// Genera la fecha de inicio y finalización del evento en formato UNIX..
$fechaInicioEventoTimestamp = fn () => strtotime("2025-12-20 09:00:00"); #Formato de tiempo año, mes, dia
$fechaFinalizacionEventoTimestamp = fn () => mktime(12, 45, 00, 12, 20, 2025); #Formato de tiempo horas, minutos, segundos, mes, dia, año.

function generarFechaInicioEvento(callable $fechaInicioEventoTimestamp, callable $formateoFecha): string
{
    $fechaTimestamp = $fechaInicioEventoTimestamp();
    $fechaFormateada = $formateoFecha($fechaTimestamp);

    return $fechaFormateada;
}

function generarFechaFinEvento(callable $fechaFinalizacionEventoTimestamp, callable $formateoFecha): string
{
    $fechaTimestamp = $fechaFinalizacionEventoTimestamp();
    $fechaFormateada = $formateoFecha($fechaTimestamp);

    return $fechaFormateada;
}

// Parte 3 de la actividad
// Calcula los días faltantes para que inicie el evento
function calculoDiasFaltantesInicioEvento(callable $fechaInicioEventoTimestamp, callable $obtenerTimestampActual): int
{
    $fechaEvento = $fechaInicioEventoTimestamp();
    $fechaActual = $obtenerTimestampActual();

    $diferencia = $fechaEvento - $fechaActual;

    $dias = floor($diferencia / 86400); #86400 es la representación de 1 día en segundos.

    return $dias;
}

function calculoDiasFaltantesFinalEveneto(callable $obtenerTimestampActual): int
{
    $fechaEvento = time();
    $fechaActual = $obtenerTimestampActual();

    $diferencia = $fechaEvento - $fechaActual;

    $dias = floor($diferencia / 86400);

    return $dias;
}

// Parte 4 de la actividad
function comprobarEstadoEvento(callable $obtenerTimestampActual): string
{
    # Fecha de inicio del evento.
    $fecha = '2025-12-20 09:00:00';
    # Obtencion de tiempo actual en timestamp UNIX
    $fechaActual = $obtenerTimestampActual();
    # Conversor de fecha actual a UNIX timestamp.
    $fechaEvento = strtotime($fecha);
    # Salida del switch.
    $centinela = 0;
    # Mesanje de return.
    $mensaje = "";

    if ($fechaActual < $fechaEvento) {
        // Si la fecha actual es anterior al evento, calcular los días faltantes
        $diferencia = $fechaEvento - $fechaActual;
        $dias = floor($diferencia / 86400);  // Convertir la diferencia en segundos a días
        $centinela = 1;  // El evento no ha comenzado
    } elseif ($fechaActual > $fechaEvento) {
        $centinela = 2;  // El evento ya ha pasado
    } else {
        $centinela = 3;  // El evento está en curso
    }

    switch ($centinela) {
        case 1:
            $mensaje = 'El evento comienza en ' . $dias . ' días.';
            break;
        case 2:
            $mensaje = 'El evento ya ha finalizado.';
            break;
        case 3:
            $mensaje = 'El evento esta en curso';
            break;
    }

    return $mensaje;
}

# Variables de uso.
$fechaSalida = $obtenerFechaInicioFormateada();
$fechaFin = $obtenerFechaFinalizacionFormateada();

$fechaIV = generarFechaInicioEvento($fechaInicioEventoTimestamp, $formateoFecha);
$fechaFV = generarFechaFinEvento($fechaFinalizacionEventoTimestamp, $formateoFecha);

$diasFaltantesI = calculoDiasFaltantesInicioEvento($fechaInicioEventoTimestamp, $obtenerTimestampActual);
$diasFaltantesF = calculoDiasFaltantesFinalEveneto($fechaFinalizacionEventoTimestamp, $obtenerTimestampActual);

$estadoE = comprobarEstadoEvento($obtenerTimestampActual);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capitulo 8 Ejemplos</title>
    <!--Fuentes importadas-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Hoja de estilos-->
    <link href="../recursos/estilos/styles.css" rel="stylesheet">
</head>
<body>
    <div class="page">
        <header>
            <a href="ejemplo.php"><img src="../recursos/imagenes/logo.png" alt="Fondo de arte en montañas" height="90"></a>
            <p><b>Sale starts:</b><?= $fechaSalida ?></p>
            <p><b>Sale ends:</b> <?= $fechaFin ?></p>
            <p><b>Fecha inicio del evento:</b> <?= $fechaIV ?></p>
            <p><b>Fecha fin del evento:</b> <?= $fechaFV ?></p>
            <p><b>Estado del evento:</b> <?= $estadoE ?> </p>
        </header>
        <footer>&copy; <?php echo date('Y')?></footer>
    </div>
</body>
</html>