<?php
$counter = 1;
$packs = 10;
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
    <h1>The Candy Store.</h1>
    <h2>Prices for Multiple Packs</h2>
    <p>
        <?php
        while ($counter < $packs) {
            echo $counter;
            echo ' packs cost $';
            echo $price * $counter;
            echo '<br>';
            $counter++;
        }
        ?>
    </p>
</body>
</html>
