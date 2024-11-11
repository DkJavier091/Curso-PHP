<?php
$price = 1.99;
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
    <h2>Prices for Large Orders</h2>
    <p>
        <?php
            for($i = 10; $i <= 200; $i = $i + 10) {
                echo $i;
                echo ' packs cost $';
                echo $price * $i;
                echo '<br>';
            }
        ?>
    </p>
    </body>
</html>