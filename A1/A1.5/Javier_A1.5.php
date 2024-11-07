<?php
$nutricion = [
    'fat' => 38,
    'sugar' => 51,
    'salt' => 0.25,
];

$nutricion['fat'] = 36;
$nutricion['fiber'] = 2.1;
$nutricion['protein'] = 7.3;
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
    <h1>The Candy</h1>
    <h2>Nutrition (per 100g)</h2>
    <p>Fat: <?php echo $nutricion['fat']; ?>%</p>
    <p>Sugar: <?php echo $nutricion['sugar']; ?>%</p>
    <p>Salt: <?php echo $nutricion['salt']; ?>%</p>
    <p>Fiber: <?php echo $nutricion['fiber']; ?>%</p>
</body>
</html>
