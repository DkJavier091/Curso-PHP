<?php
$prefix = "Thank you";
$name = "Javier";
$message = "$prefix $name";
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
    <h1>The Candy Store</h1>
    <h2><?= $name ?>'s Order</h2>
    <p><?= $message?></p>
</body>
</html>
