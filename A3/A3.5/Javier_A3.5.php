<?php
$tax_rate = 0.3;
$global_discount = 0.2;
function calculate_running_total($price, $quantity){
    global $tax_rate, $global_discount;
    static $running_total = 0;
    $total = $price * $quantity;
    $tax = $total * $tax_rate;
    $discount = $total * $global_discount;
    $running_total = $running_total + $total + $tax - $discount;
    return $running_total;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Global and Static Variables</title>
    <link rel="stylesheet" href="../../Recursos%20A3/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Running total</th>
        </tr>
        <tr>
            <td>Mints:</td>
            <td>$2</td>
            <td>5</td>
            <td>$<?= calculate_running_total(2, 5) ?></td>
        </tr>
        <tr>
            <td>Toffee:</td>
            <td>$3</td>
            <td>5</td>
            <td>$<?= calculate_running_total(3, 5) ?></td>
        </tr>
        <tr>
            <td>Fudge:</td>
            <td>$5</td>
            <td>4</td>
            <td>$<?= calculate_running_total(5, 4) ?></td>
        </tr>
        <tr>
            <td>Candy:</td>
            <td>$6</td>
            <td>4</td>
            <td>$<?= calculate_running_total(6, 4) ?></td>
        </tr>
        <tr>
            <td>Galletas:</td>
            <td>$7</td>
            <td>4</td>
            <td>$<?= calculate_running_total(7, 4) ?></td>
        </tr>
    </table>
</body>
</html>