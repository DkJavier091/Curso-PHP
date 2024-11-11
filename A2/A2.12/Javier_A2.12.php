<?php
$best_sellers = ['Toffee', 'Mints', 'Fudge', 'White chocolate', 'Black chocolate'];
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
    <h1>The Candy Store</h1>
    <h2>Best Sellers</h2>
    <?php foreach ($best_sellers as $candy) {?>
        <p><?= $candy?></p>
    <?php }
    ?>
</body>
</html>
