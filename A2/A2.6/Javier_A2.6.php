<?php
$day = "Wednesday";

$offer = match($day){
    'Monday' => "20% off chocolates.",
    'Tuesday' => "15% off white chocolates.",
    'Saturday', 'Sunday' => "20% off mints.",
};
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
    <h2>Offers on <?= $day?></h2>
    <p><?= $offer?></p>
</body>
</html>
