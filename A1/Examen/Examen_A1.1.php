<?php

// Array multidimencional que recoge los datos personales del alumnado con sus respectivos valores.
$datos_Personales = [
    ['name' => "Alex García", 'fecha_Nacimiento' => "14-03-2005", 'recidencia' => 'Madrid', 'telefono' => 698997763, 'correo' => 'alex.garcia@example.com', 'estado_Repetidor' => 'No',],
    ['name' => "Maria López", 'fecha_Nacimiento' => "20-05-2005", 'recidencia' => 'Barcelona', 'telefono' => 612321147, 'correo' => 'maria.lopez@example.com', 'estado_Repetidor' => 'Si',],
    ['name' => "Juan Pérez", 'fecha_Nacimiento' => "8-11-2024", 'recidencia' => 'Sevilla', 'telefono' => 677998844, 'correo' => 'juan.perez@example.com', 'estado_Repetidor' => 'No',],
    ['name' => "Lucia Sánchez", 'fecha_Nacimiento' => "22-9-2005", 'recidencia' => 'Valencia', 'telefono' => 664889977, 'correo' => 'lucia.sanchez@example.com', 'estado_Repetidor' => 'Si'],
    ['name' => "Carlos Martínez", 'fecha_Nacimiento' => "5-1-2005", 'recidencia' => 'Zaragoza', 'telefono' => 61899755, 'correo' => 'carlos.martinez@example.com', 'estado_Repetidor' => 'No']
];

// Array multidimencional que recoge los datos de la asignatura de matemáticas con sus respectivas notas.
$mates = [
    ['Examen1' => 6, 'Examen2' => 7, 'Examen3' =>8, 'Examen4' =>6, 'Examen5' =>7,],
    ['Examen1' => 6, 'Examen2' => 7, 'Examen3' =>8, 'Examen4' =>6, 'Examen5' =>7,],
    ['Examen1' => 6, 'Examen2' => 7, 'Examen3' =>8, 'Examen4' =>6, 'Examen5' =>7,],
    ['Examen1' => 6, 'Examen2' => 7, 'Examen3' =>8, 'Examen4' =>6, 'Examen5' =>7,],
    ['Examen1' => 6, 'Examen2' => 7, 'Examen3' =>8, 'Examen4' =>6, 'Examen5' =>7,],
];

// Array multidimencional que recoge los datos de la asignatura de lengua con sus respectivas notas.
$lengua = [
    ['Examen1' => 5, 'Examen2' => 6, 'Comentario' => 7,],
    ['Examen1' => 5, 'Examen2' => 6, 'Comentario' => 7,],
    ['Examen1' => 5, 'Examen2' => 6, 'Comentario' => 7,],
    ['Examen1' => 5, 'Examen2' => 6, 'Comentario' => 7,],
    ['Examen1' => 5, 'Examen2' => 6, 'Comentario' => 7,],
];

// Array multidimencional que recoge los datos de la asignatura de ingles con sus respectivas notas.
$ingles = [
    ['lectura' => 6, 'audio' => 7, 'oral' => 6, 'escritura' => 6],
    ['lectura' => 6, 'audio' => 7, 'oral' => 6, 'escritura' => 6],
    ['lectura' => 6, 'audio' => 7, 'oral' => 6, 'escritura' => 6],
    ['lectura' => 6, 'audio' => 7, 'oral' => 6, 'escritura' => 6],
    ['lectura' => 6, 'audio' => 7, 'oral' => 6, 'escritura' => 6],
];

// Array multidimencional que recoge los datos de la asignatura de tecnologia con sus respectivas notas.
$tecnologia = [
    ['proyecto' => 8, 'colaboracion' => 7,],
    ['proyecto' => 8, 'colaboracion' => 7,],
    ['proyecto' => 8, 'colaboracion' => 7,],
    ['proyecto' => 8, 'colaboracion' => 7,],
    ['proyecto' => 8, 'colaboracion' => 7,],
];

// Generador del resultado de la asignatura Mates
$mates[0]['Resultado'] = (($mates[0]['Examen1'] + $mates[0]['Examen2'] + $mates[0]['Examen3'] + $mates[0]['Examen4'] + $mates[0]['Examen5']) / 5);
$mates[1]['Resultado'] = (($mates[1]['Examen1'] + $mates[1]['Examen2'] + $mates[1]['Examen3'] + $mates[1]['Examen4'] + $mates[1]['Examen5']) / 5);
$mates[2]['Resultado'] = (($mates[2]['Examen1'] + $mates[2]['Examen2'] + $mates[2]['Examen3'] + $mates[2]['Examen4'] + $mates[2]['Examen5']) / 5);
$mates[3]['Resultado'] = (($mates[3]['Examen1'] + $mates[3]['Examen2'] + $mates[3]['Examen3'] + $mates[3]['Examen4'] + $mates[3]['Examen5']) / 5);
$mates[4]['Resultado'] = (($mates[4]['Examen1'] + $mates[4]['Examen2'] + $mates[4]['Examen3'] + $mates[4]['Examen4'] + $mates[4]['Examen5']) / 5);

// Generador del resultado de la asignatura Lengua
$lengua[0]['Resultado'] = (($lengua[0]['Examen1'] + $lengua[0]['Examen2']) * 0.4) + ($lengua[0]['Comentario'] * 0.6) /3;
$lengua[1]['Resultado'] = (($lengua[1]['Examen1'] + $lengua[1]['Examen2']) * 0.4) + ($lengua[1]['Comentario'] * 0.6) /3;
$lengua[2]['Resultado'] = (($lengua[2]['Examen1'] + $lengua[2]['Examen2']) * 0.4) + ($lengua[2]['Comentario'] * 0.6) /3;
$lengua[3]['Resultado'] = (($lengua[3]['Examen1'] + $lengua[3]['Examen2']) * 0.4) + ($lengua[3]['Comentario'] * 0.6) /3;
$lengua[4]['Resultado'] = (($lengua[4]['Examen1'] + $lengua[4]['Examen2']) * 0.4) + ($lengua[4]['Comentario'] * 0.6) /3;

// Generador del resultado de la asignatura Ingles
$ingles[0]['Resultado'] = (($ingles[0]['lectura'] + $ingles[0]['audio'] + $ingles[0]['oral'] + $ingles[0]['escritura']) / 4);
$ingles[1]['Resultado'] = (($ingles[1]['lectura'] + $ingles[1]['audio'] + $ingles[1]['oral'] + $ingles[1]['escritura']) / 4);
$ingles[2]['Resultado'] = (($ingles[2]['lectura'] + $ingles[2]['audio'] + $ingles[2]['oral'] + $ingles[2]['escritura']) / 4);
$ingles[3]['Resultado'] = (($ingles[3]['lectura'] + $ingles[3]['audio'] + $ingles[3]['oral'] + $ingles[3]['escritura']) / 4);
$ingles[4]['Resultado'] = (($ingles[4]['lectura'] + $ingles[4]['audio'] + $ingles[4]['oral'] + $ingles[4]['escritura']) / 4);

// Generador del resultado de la asignatura Tecnologia
$tecnologia[0]['Resultado'] = ($tecnologia[0]['proyecto'] * 0.8) + ($tecnologia[0]['colaboracion'] * 0.2) / 2;
$tecnologia[1]['Resultado'] = ($tecnologia[1]['proyecto'] * 0.8) + ($tecnologia[1]['colaboracion'] * 0.2) / 2;
$tecnologia[2]['Resultado'] = ($tecnologia[2]['proyecto'] * 0.8) + ($tecnologia[2]['colaboracion'] * 0.2) / 2;
$tecnologia[3]['Resultado'] = ($tecnologia[3]['proyecto'] * 0.8) + ($tecnologia[3]['colaboracion'] * 0.2) / 2;
$tecnologia[4]['Resultado'] = ($tecnologia[4]['proyecto'] * 0.8) + ($tecnologia[4]['colaboracion'] * 0.2) / 2;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>Datos de Evaluación para Cada Estudiante</h1>
    <h2>Estudiante 1: <?= $datos_Personales[0]['name'] ?></h2>
    <ul>
        <li>Fecha nacimiento: <?= $datos_Personales[0]['fecha_Nacimiento'] ?></li>
        <li>Lugar de Residencia: <?= $datos_Personales[0]['recidencia'] ?></li>
        <li>Teléfono: <?= $datos_Personales[0]['telefono'] ?></li>
        <li>Correo Electronico: <?= $datos_Personales[0]['correo'] ?></li>
    </ul>
    <h3>Evaluaciones:</h3>
    <ul>
        <li><b>Matemáticas</b></li>
        <li>Nota Final: <?= $mates[0]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Lengua:</b></li>
        <li>Nota Final: <?= $lengua[0]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Inglés:</b></li>
        <li>Nota Final: <?= $ingles[0]['Resultado'] ?></li>
    </ul>

    <ul>
        <li><b>Tecnología:</b></li>
        <li>Nota Final: <?= $tecnologia[0]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Calificación del Curso:</b></li>
        <li>Repetición: <?= $datos_Personales[0]['estado_Repetidor'] ?></li>
    </ul>

    <br>
    <br>

    <h2>Estudiante 2: <?= $datos_Personales[1]['name'] ?></h2>
    <ul>
        <li>Fecha nacimiento: <?= $datos_Personales[1]['fecha_Nacimiento'] ?></li>
        <li>Lugar de Residencia: <?= $datos_Personales[1]['recidencia'] ?></li>
        <li>Teléfono: <?= $datos_Personales[1]['telefono'] ?></li>
        <li>Correo Electronico: <?= $datos_Personales[1]['correo'] ?></li>
    </ul>
    <h3>Evaluaciones:</h3>
    <ul>
        <li><b>Matemáticas</b></li>
        <li>Nota Final: <?= $mates[1]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Lengua:</b></li>
        <li>Nota Final: <?= $lengua[1]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Inglés:</b></li>
        <li>Nota Final: <?= $ingles[1]['Resultado'] ?></li>
    </ul>

    <ul>
        <li><b>Tecnología:</b></li>
        <li>Nota Final: <?= $tecnologia[1]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Calificación del Curso:</b></li>
        <li>Repetición: <?= $datos_Personales[1]['estado_Repetidor'] ?></li>
    </ul>

    <br>
    <br>
    <h2>Estudiante 3: <?= $datos_Personales[2]['name'] ?></h2>
    <ul>
        <li>Fecha nacimiento: <?= $datos_Personales[2]['fecha_Nacimiento'] ?></li>
        <li>Lugar de Residencia: <?= $datos_Personales[2]['recidencia'] ?></li>
        <li>Teléfono: <?= $datos_Personales[2]['telefono'] ?></li>
        <li>Correo Electronico: <?= $datos_Personales[2]['correo'] ?></li>
    </ul>
    <h3>Evaluaciones:</h3>
    <ul>
        <li><b>Matemáticas</b></li>
        <li>Nota Final: <?= $mates[2]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Lengua:</b></li>
        <li>Nota Final: <?= $lengua[2]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Inglés:</b></li>
        <li>Nota Final: <?= $ingles[2]['Resultado'] ?></li>
    </ul>

    <ul>
        <li><b>Tecnología:</b></li>
        <li>Nota Final: <?= $tecnologia[2]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Calificación del Curso:</b></li>
        <li>Repetición: <?= $datos_Personales[2]['estado_Repetidor'] ?></li>
    </ul>

    <br>
    <br>

    <h2>Estudiante 4: <?= $datos_Personales[3]['name'] ?></h2>
    <ul>
        <li>Fecha nacimiento: <?= $datos_Personales[3]['fecha_Nacimiento'] ?></li>
        <li>Lugar de Residencia: <?= $datos_Personales[3]['recidencia'] ?></li>
        <li>Teléfono: <?= $datos_Personales[3]['telefono'] ?></li>
        <li>Correo Electronico: <?= $datos_Personales[3]['correo'] ?></li>
    </ul>
    <h3>Evaluaciones:</h3>
    <ul>
        <li><b>Matemáticas</b></li>
        <li>Nota Final: <?= $mates[3]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Lengua:</b></li>
        <li>Nota Final: <?= $lengua[3]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Inglés:</b></li>
        <li>Nota Final: <?= $ingles[3]['Resultado'] ?></li>
    </ul>

    <ul>
        <li><b>Tecnología:</b></li>
        <li>Nota Final: <?= $tecnologia[3]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Calificación del Curso:</b></li>
        <li>Repetición: <?= $datos_Personales[3]['estado_Repetidor'] ?></li>
    </ul>

    <br>
    <br>

    <h2>Estudiante 5: <?= $datos_Personales[4]['name'] ?></h2>
    <ul>
        <li>Fecha nacimiento: <?= $datos_Personales[4]['fecha_Nacimiento'] ?></li>
        <li>Lugar de Residencia: <?= $datos_Personales[4]['recidencia'] ?></li>
        <li>Teléfono: <?= $datos_Personales[4]['telefono'] ?></li>
        <li>Correo Electronico: <?= $datos_Personales[4]['correo'] ?></li>
    </ul>
    <h3>Evaluaciones:</h3>
    <ul>
        <li><b>Matemáticas</b></li>
        <li>Nota Final: <?= $mates[4]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Lengua:</b></li>
        <li>Nota Final: <?= $lengua[4]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Inglés:</b></li>
        <li>Nota Final: <?= $ingles[4]['Resultado'] ?></li>
    </ul>

    <ul>
        <li><b>Tecnología:</b></li>
        <li>Nota Final: <?= $tecnologia[4]['Resultado']?></li>
    </ul>

    <ul>
        <li><b>Calificación del Curso:</b></li>
        <li>Repetición: <?= $datos_Personales[4]['estado_Repetidor'] ?></li>
    </ul>
</body>
</html>
