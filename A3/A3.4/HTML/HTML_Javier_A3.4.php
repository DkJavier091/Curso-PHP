<?php
$tax = '25';
function calculate_total($price, $quantity, $tax){
    $cost = $price * $quantity;
    $tax_amount = $cost * ($tax / 100);
    $total = $cost + $tax_amount;
    return $total;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Global and Local Scope</title>
    <link rel="stylesheet" href="../../Recursos%20A3/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <p>Mints: $<?= calculate_total(2, 5, $tax) ?></p>
    <p>Toffee: $<?= calculate_total(3, 5, $tax) ?></p>
    <p>Fudge: $<?= calculate_total(5, 4, $tax) ?></p>
    <p>Prices include tax at: <?= $tax ?>%</p>
</body>
</html>