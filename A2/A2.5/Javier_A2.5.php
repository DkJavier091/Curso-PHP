<?php
$day = "Wednesday";

switch ($day){
    case 'Monday':
        $offer = "20% of chocolates.";
        break;
    case 'Tuesday':
        $offer = "20% of mints.";
        break;
    case 'Wednesday':
        $offer = "20% of White Chocolates.";
        break;
    default:
        $offer = "Buy three packs, get one free.";
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
    <h2>Offer on <?= $day?></h2>
    <p><?= $offer?></p>
</body>
</html>
