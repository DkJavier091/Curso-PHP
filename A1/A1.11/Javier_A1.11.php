<?php
$item = "Chocolate";
$stock = 3;
$wanted = 5;
$deliver = true;
$can_buy = (($wanted <= $stock)&& ($deliver == true));
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
<p>Ordered: <?= $wanted ?></p>
<p>Can buy: <?= $can_buy ?></p>
</body>
</html>