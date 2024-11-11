<?php
$stock = 0;

if ($stock > 0){
    $message = "In stock.";
} else {
    $message = "More stock coming soon.";
}

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
    <h2>Chocolate</h2>
    <p><?= $message?></p>
</body>
</html>
