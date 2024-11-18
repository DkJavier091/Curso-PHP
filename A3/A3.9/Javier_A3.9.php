<?php
$stock_chocolates = 25;
$stock_caramelos = 5;
$stock_galletas = 0;
$stock_chicles = 10;
$stock_helados = 15;

function get_stock_message($stock){
    if ($stock == 10){
        return "Exactly 10 items in stock";
    }
    if ($stock > 10){
        return 'Good availability';
    } if ($stock > 0 && $stock < 10){
        return 'Low stock';
    }
    return 'Out of stock';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock Messages for Products</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<table border="1">
    <thead>
    <tr>
        <th>Producto</th>
        <th>Stock</th>
        <th>Mensaje</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Chocolates</td>
        <td><?= $stock_chocolates ?></td>
        <td><?= get_stock_message($stock_chocolates) ?></td>
    </tr>
    <tr>
        <td>Caramelos</td>
        <td><?= $stock_caramelos ?></td>
        <td><?= get_stock_message($stock_caramelos) ?></td>
    </tr>
    <tr>
        <td>Galletas</td>
        <td><?= $stock_galletas ?></td>
        <td><?= get_stock_message($stock_galletas) ?></td>
    </tr>
    <tr>
        <td>Chicles</td>
        <td><?= $stock_chicles ?></td>
        <td><?= get_stock_message($stock_chicles) ?></td>
    </tr>
    <tr>
        <td>Helados</td>
        <td><?= $stock_helados ?></td>
        <td><?= get_stock_message($stock_helados) ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>
