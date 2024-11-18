<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 0){
    $cost = $cost * $quantity;
    return $cost - $discount + $tax;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Functions with Parameters</title>
        <link rel="stylesheet" href="../Recursos%20A3/css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Chocolates</h2>
        <table>
        <tr>
            <th>Product</th>
            <th>Cost per Item ($)</th>
            <th>Quantity</th>
            <th>Discount ($)</th>
            <th>Tax ($)</th>
            <th>Total Cost ($)</th>
        </tr>
        
        <tr>
            <td>Dark chocolate</td>
            <td>5</td>
            <td>10</td>
            <td>5</td>
            <td>0</td>
            <td><?= calculate_cost(5, 10, 5) ?></td>
        </tr>
        <tr>
            <td>Milk chocolate</td>
            <td>3</td>
            <td>4</td>
            <td>0</td>
            <td>0</td>
            <td><?= calculate_cost(3, 4) ?></td>
        </tr>
        <tr>
            <td>White chocolate</td>
            <td>4</td>
            <td>15</td>
            <td>20</td>
            <td>0</td>
            <td><?= calculate_cost(4, 15, 20) ?></td>
        </tr>
        <tr>
            <td>Oreo</td>
            <td>7</td>
            <td>10</td>
            <td>5</td>
            <td>0</td>
            <td><?= calculate_cost(2, 10, 5) ?></td>
        </tr>
        <tr>
            <td>Manzana</td>
            <td>5</td>
            <td>10</td>
            <td>5</td>
            <td>0</td>
            <td><?= calculate_cost(3, 10, 5) ?></td>
        </tr>
        <tr>
            <td>Platano</td>
            <td>3</td>
            <td>10</td>
            <td>5</td>
            <td>0</td>
            <td><?= calculate_cost(2, 10, 5) ?></td>
        </tr>
    </table>

    </body>    
</html>
