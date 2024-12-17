<?php

// Contenido de un artículo web
$contenidoArticulo = '<h1>Mejora tu Productividad con 3 Pasos Sencillos<h1>
        <p>Establece prioridades claras, elimina distracciones y utiliza técnicas como el método Pomodoro.
        Reflexiona al final del día para ajustar y mejorar. ¡Tu tiempo vale oro! <p>';

// Detección y análisis de subcadenas

// 1. Detectar la primera y última aparición de la palabra "tu"
$primeraAparicion = stripos($contenidoArticulo, 'tu');
$ultimaAparicion = strripos($contenidoArticulo, 'tu');

// 2. Comprobar si el artículo contiene la palabra clave "Pomodoro"
$contienePomodoro = str_contains($contenidoArticulo, "Pomodoro");

// 3. Extraer partes del texto basadas en subcadenas específicas
$textoReflexiona = strstr($contenidoArticulo, "Reflexiona");

// 4. Comprobar si el texto comienza o termina con "!"
$comienzaCon = str_starts_with($contenidoArticulo, "!");
$terminaCon = str_ends_with($contenidoArticulo, "!");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Blog</title>
</head>

<body>
    <h1>Contenido del Artículo</h1>
    <?= $contenidoArticulo ?>

    <h1>Primera y Última Aparición de "tu"</h1>
    <ul>
        <li>Primera aparición: <?= $primeraAparicion ?></li>
        <li>Última aparición: <?= $ultimaAparicion ?></li>
    </ul>

    <h1>Comprobar Palabra Clave</h1>
    <p>¿El texto contiene la palabra clave "Pomodoro"?: <?= $contienePomodoro ? 'Sí' : 'No' ?></p>

    <h1>Extraer Partes del Texto</h1>
    <p>Parte extraída desde "Reflexiona": <?= $textoReflexiona ?></p>

    <h1>Comprobar Inicio y Fin del Texto</h1>
    <ul>
        <li>¿Comienza con "!": <?= $comienzaCon ? 'Sí' : 'No' ?></li>
        <li>¿Termina con "!": <?= $terminaCon ? 'Sí' : 'No' ?></li>
    </ul>
</body>

</html>