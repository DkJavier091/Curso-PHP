<?php
$texto = "Bienvenidos al blog de entradas. Es importante proceder con cuidado al analizar los datos importantes. Este es un ejemplo de cómo generar un resumen mostrando solo las primeras palabras de un texto, asegurando que el contenido sea conciso y directo.";

$texto_mayusculas = strtoupper($texto);
$texto_capitalizado = ucwords($texto);
$longitud_texto = strlen($texto);

$texto_sin_espacios = str_replace(" ", "", $texto);
$longitud_sin_espacios = strlen($texto_sin_espacios);

$cantidad_palabras = str_word_count($texto);

$frecuencia_palabras = array_count_values(str_word_count(strtolower($texto), 1));

$palabras_clave = ["importante", "procesar"];
$texto_resaltado = $texto;
foreach ($palabras_clave as $palabra) {
    $texto_resaltado = str_replace($palabra, "<mark>$palabra</mark>", $texto_resaltado);
}

$resumen_texto = implode(' ', array_slice(explode(' ', $texto), 0, 50)) . '...';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion de blog</title>
</head>

<body>
    <h1>Análisis del Texto del Blog</h1>
    <p><b>Texto original: </b><?= $texto ?></p>
    <p><b>Texto en mayúsculas:</b> <?= $texto_mayusculas ?></p>
    <p><b>Texto con cada palabra capitalizada:</b> <?= $texto_capitalizado ?></p>
    <p><b>Longitud del texto en caracteres:</b> <?= $longitud_texto ?></p>
    <p><b>Longitud del texto en caracteres sin espacios:</b> <?= $longitud_sin_espacios ?></p>
    <p><b>Cantidad de palabras en el texto:</b> <?= $cantidad_palabras ?></p>
    <p><b>Frecuencia de cada palabra:</b></p>
    <ul>
        <?php foreach ($frecuencia_palabras as $palabra => $frecuencia): ?>
            <li><?= $palabra ?>: <?= $frecuencia ?></li>
        <?php endforeach; ?>
    </ul>
    <p><b>Texto con palabras clave resaltadas:</b> <?= $texto_resaltado ?></p>
    <p><b>Resumen del texto:</b> <?= $resumen_texto ?></p>
</body>

</html>