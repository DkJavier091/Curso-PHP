<?php
$username = "Javier";

$greeting = "Hi, " . $username . ".";

$offer = [
    'item' => 'Chocolate',
    'qty' => 3,
    'price' => 6,
    'discount' => 4,
];

$usual_price = $offer['qty'] * $offer['price'];
$offer_price = $offer['qty'] * $offer['discount'];
$saving = $usual_price - $offer_price;
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
    <h2>Multi-buy Offer</h2>
    <p><?= $greeting?></p>
    <p class="sticker">Save $<?= $saving?></p>

    <p>Buy <?= $offer['qty'] ?> packs of <?= $offer['item'] ?>
    for $<?= $offer_price ?><br> (usual price $<?= $usual_price ?>)</p>
</body>
</html>
