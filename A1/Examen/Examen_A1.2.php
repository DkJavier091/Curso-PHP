<?php

// Array asociativo de 1hora
$Hora1 = [
    'Lunes' => "DIW",
    'Martes' => "DAW",
    'Miercoles' => "DWES",
    'Jueves' => "DWES",
    'Viernes' => "DWES",
];
// Array asociativo de 2hora

$Hora2 = [
    'Lunes' => "DIW",
    'Martes' => "DWES",
    'Miercoles' => "DWES",
    'Jueves' => "DWES",
    'Viernes' => "DWES",
];
// Array asociativo de 3hora

$Hora3 = [
    'Lunes' => "EIE",
    'Martes' => "DWES",
    'Miercoles' => "DWEC",
    'Jueves' => "DIW",
    'Viernes' => "DIW",
];
// Array asociativo de 4hora

$Hora4 = [
    'Lunes' => "EIE",
    'Martes' => "DWEC",
    'Miercoles' => "DWEC",
    'Jueves' => "DIW",
    'Viernes' => "DIW",
];
// Array asociativo de 5hora

$Hora5 = [
    'Lunes' => "DWEC",
    'Martes' => "DWEC",
    'Miercoles' => "HLC",
    'Jueves' => "EIE",
    'Viernes' => "DAW",
];

$Hora6 = [
    'Lunes' => "DWEC",
    'Martes' => "HLC",
    'Miercoles' => "DAW",
    'Jueves' => "EIE",
    'Viernes' => "HLC",
];

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }
    th, td {
        border: 1px solid black;
        padding: 10px;
    }
    th {
        background
    }
    </style>
<body>
    <table>
        <tr>
            <td>Hora</td>
            <td>Lunes</td>
            <td>Martes</td>
            <td>Miercoles</td>
            <td>Jueves</td>
            <td>Viernes</td>
        </tr>

        <tr>
            <td>1ºHora</td>
            <td><?=$Hora1['Lunes']?></td>
            <td><?=$Hora1['Martes']?></td>
            <td><?=$Hora1['Miercoles']?></td>
            <td><?=$Hora1['Jueves']?></td>
            <td><?=$Hora1['Viernes']?></td>
        </tr>

        <tr>
            <td>2ºHora</td>
            <td><?=$Hora2['Lunes']?></td>
            <td><?=$Hora2['Martes']?></td>
            <td><?=$Hora2['Miercoles']?></td>
            <td><?=$Hora2['Jueves']?></td>
            <td><?=$Hora2['Viernes']?></td>
        </tr>

        <tr>
            <td>3ºHora</td>
            <td><?=$Hora3['Lunes']?></td>
            <td><?=$Hora3['Martes']?></td>
            <td><?=$Hora3['Miercoles']?></td>
            <td><?=$Hora3['Jueves']?></td>
            <td><?=$Hora3['Viernes']?></td>
        </tr>

        <tr>
            <td>Recreo</td>
            <td></td>
            <td></td>
            <td>Recreo</td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>4ºHora</td>
            <td><?=$Hora4['Lunes']?></td>
            <td><?=$Hora4['Martes']?></td>
            <td><?=$Hora4['Miercoles']?></td>
            <td><?=$Hora4['Jueves']?></td>
            <td><?=$Hora4['Viernes']?></td>
        </tr>

        <tr>
            <td>5ºHora</td>
            <td><?=$Hora5['Lunes']?></td>
            <td><?=$Hora5['Martes']?></td>
            <td><?=$Hora5['Miercoles']?></td>
            <td><?=$Hora5['Jueves']?></td>
            <td><?=$Hora5['Viernes']?></td>
        </tr>

        <tr>
            <td>6ºHora</td>
            <td><?=$Hora6['Lunes']?></td>
            <td><?=$Hora6['Martes']?></td>
            <td><?=$Hora6['Miercoles']?></td>
            <td><?=$Hora6['Jueves']?></td>
            <td><?=$Hora6['Viernes']?></td>
        </tr>


    </table>
</body>
</html>
