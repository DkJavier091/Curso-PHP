<?php
$item = "Chocolate";
$stock = 8;
$wanted = 5;
$can_buy = ($wanted <= $stock);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Shopping Cart</h2>
    <p>Item: <?= $item ?></p>
    <p>Stock: <?= $stock ?></p>
    <p>Wanted: <?= $wanted ?></p>
    <p>Can buy: <?= $can_buy ?></p>
</body>
</html>