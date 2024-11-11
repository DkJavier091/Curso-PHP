<?php
$name = " ";
$greeting = "Hello";

if ($name !== " "){
    $greeting = "Welcome back, ".$name;
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Recursos%20A2/css/styles.css">
    <title>Index</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2><?= $greeting?></h2>
</body>
</html>
