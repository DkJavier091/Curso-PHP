<?php
$best_sellers = ['Chocolate', 'Mints', 'Fudge','Cola', 'Bubble gum', 'Toffee', 'Jelly beans'];
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
    <h1>The Candy Store</h1>
    <h2>Best Sellers</h2>
    <ul>
        <li><?php echo $best_sellers[0];?></li>
        <li><?php echo $best_sellers[1];?></li>
        <li><?php echo $best_sellers[2];?></li>
        <li><?php echo $best_sellers[4];?></li>
        <li><?php echo $best_sellers[5];?></li>
    </ul>
</body>
</html>