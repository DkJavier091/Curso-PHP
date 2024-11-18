<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 20, $shipping = 0){
    $cost = $cost * $quantity;
    $tax = $cost * ($tax / 100);
    $total_cost = ($cost + $tax) - $discount;
    return $total_cost + $shipping;
}

$products = [
    ['name' => 'Dark Chocolate', 'cost' => 5, 'quantity' => 10, 'discount' => 2, 'tax' => 5, 'shipping' => 3],
    ['name' => 'Milk Chocolate', 'cost' => 5, 'quantity' => 10, 'discount' => 0, 'tax' => 5, 'shipping' => 0],
    ['name' => 'White Chocolate', 'cost' => 10, 'quantity' => 5, 'discount' => 0, 'tax' => 5, 'shipping' => 0],
    ['name' => 'Pastel Manzana', 'cost' => 3.4, 'quantity' => 12, 'discount' => 3, 'tax' => 10, 'shipping' => 5],
    ['name' => 'Platano Frito', 'cost' => 2.3, 'quantity' => 8, 'discount' => 0, 'tax' => 10, 'shipping' => 0],
    ['name' => 'Oreo', 'cost' => 5, 'quantity' => 25, 'discount' => 2, 'tax' => 13, 'shipping' => 2]
];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Default Values for Parameters</title>
        <link rel="stylesheet" href="../Recursos%20A3/css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Chocolates</h2>
        <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Cost per Unit</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Tax</th>
                <th>Shipping</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td>$<?= $product['cost'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td>$<?= $product['discount'] ?></td>
                    <td><?= $product['tax'] ?>%</td>
                    <td>$<?= $product['shipping'] ?></td>
                    <td>$<?= calculate_cost(
                        $product['cost'],
                        $product['quantity'],
                        $product['discount'],
                        $product['tax'],
                        $product['shipping']
                    ) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </body>    
</html> 
