<?php
$price = "4";
$quantity = 3;
function calculate_total(int|float $price, int|float $quantity): int|float{
    return $price * $quantity;
}
$total = calculate_total($price, $quantity);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Type Declarations</title>
    <link rel="stylesheet" href="../Recursos%20A3/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>Total $<?= $total ?></p>
</body>
</html>