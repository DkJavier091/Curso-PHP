<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Recursos%20A3/css/styles.css">
    <?php include_once "../PHP/PHP_Javier_A3.3.php"; ?>
    <title>The Candy Store</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <p>Mints: $<?=calculate_total(2,5) ?></p>
    <p>Toffee: $<?=calculate_total(3,5) ?></p>
    <p>Fudge: $<?=calculate_total(5,4) ?></p>
    <p>Gum: $<?=calculate_total(1.5, 4)?></p>
</body>
</html>