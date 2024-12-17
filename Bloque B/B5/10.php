<?php
// Definimos una constante para el nombre de la red social
define('RED_SOCIAL', 'Intereses y Hobbies');

// 1. Lista de Intereses
$intereses = [
    'Leer',
    'Correr',
    'Cocinar',
    'Viajar',
    'Fotografía'
];

// Función para mostrar intereses
function mostrarIntereses($intereses)
{
    return implode(', ', $intereses);
}

// Función para agregar un nuevo interés
function agregarInteres(&$intereses, $nuevoInteres)
{
    $intereses[] = $nuevoInteres;
}

// Función para numerar aleatoriamente los intereses
function numerarIntereses($intereses)
{
    $numerados = [];
    foreach ($intereses as $interes) {
        $numeroAleatorio = mt_rand(1, 100);
        // Asegurar que no se repitan los números aleatorios
        while (array_key_exists($numeroAleatorio, $numerados)) {
            $numeroAleatorio = mt_rand(1, 100);
        }
        $numerados[$numeroAleatorio] = $interes;
    }
    ksort($numerados);
    return $numerados;
}

// Agregamos un nuevo interés (simulando la entrada del usuario)
agregarInteres($intereses, 'Pintura');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= RED_SOCIAL ?></title>
</head>

<body>
    <h1>Bienvenido a <?= RED_SOCIAL ?></h1>

    <h2>Lista de Intereses:</h2>
    <p><?= mostrarIntereses($intereses); ?></p>

    <h2>Intereses Numerados Aleatoriamente:</h2>
    <ul>
        <?php
        $interesesNumerados = numerarIntereses($intereses);
        foreach ($interesesNumerados as $numero => $interes): ?>
            <li><?= $numero ?> - <?= $interes ?></li>
        <?php endforeach; ?>
    </ul>
    <?php
    ?>

    <!-- Agradecimiento -->
    <h1>¡Gracias por agregar un nuevo interés!</h1>
</body>

</html>