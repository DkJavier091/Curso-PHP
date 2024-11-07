<?php
$desayunos = [
    'churros' => 0.60,
    'media tostada' => 1.5,
    'tostada entera' => 2,
    'chocolate' => 1.10,
    'bolsa_llevar' => 0.10,
];

$name = "Javier";
$saludo = "Bienvenido que va a tomar hoy, ";
$messaje = "$saludo $name";

?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Css/styles.css">
    <title>Document</title>
</head>
<body>
    <h1><?= $messaje ?></h1>

    <h1>Carta:</h1>
    <ul>
        <li>Churros <?= $desayunos['churros'];?>€ por unidad</li>
        <li>Media tostada <?= $desayunos['media tostada'];?>€, incluye el aceite y tomate triturado.</li>
        <li>Tostada entera <?= $desayunos['tostada entera'];?>€ incluye el aceite y tomate triturado.</li>
        <li>Chocolate <?= $desayunos['chocolate'];?>€ por unidad</li>
        <li>Churros Llevar <?= $desayunos["churros"] + $desayunos["bolsa_llevar"]?>€ por unidad</li>
    </ul>
</body>
</html>
