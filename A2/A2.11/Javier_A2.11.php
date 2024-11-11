<?php
$products =[
    'Toffee' => 2.99,
    'Mints' => 1.99,
    'Fudge' => 3.49,
    'white chocolate' => 2.55,
    'black chocolate' => 2.99,
];
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
    <h2>Price List</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>
        <?php
            foreach($products as $item => $price){
                ?>
                <tr>
                    <td><?= $item?></td>
                    <td>$<?= $price?></td>
                </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>