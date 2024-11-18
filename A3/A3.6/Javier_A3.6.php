<?php
$us_price_chocolates = 4;
$us_price_caramelos = 3;
$us_price_galletas = 5;
$rates = [ 'uk' => 0.81, 'eu' => 0.93, 'jp' => 113.21, 'aud' => 1.30, 'cad' => 1.25];

function calculate_prices($usd, $exchange_rates) {
    $prices = [
        'pound' => $usd * $exchange_rates['uk'],
        'euro' => $usd * $exchange_rates['eu'],
        'yen' => $usd * $exchange_rates['jp'],
        'aud' => $usd * $exchange_rates['aud'],
        'cad' => $usd * $exchange_rates['cad'],
    ];
    return $prices;
}

function format_price($price, $currency_symbol) {
    return sprintf("%s%.2f", $currency_symbol, $price);
}

$global_prices_chocolates = calculate_prices($us_price_chocolates, $rates);
$global_prices_caramelos = calculate_prices($us_price_caramelos, $rates);
$global_prices_galletas = calculate_prices($us_price_galletas, $rates);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prices in Different Currencies</title>
    <link rel="stylesheet" href="../Recursos%20A3/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Chocolates</h2>
<p>US $<?= format_price($us_price_chocolates, '$') ?></p>
<p>
    (UK &pound; <?= format_price($global_prices_chocolates['pound'], '£') ?> |
    EU &euro; <?= format_price($global_prices_chocolates['euro'], '€') ?> |
    JP &yen; <?= format_price($global_prices_chocolates['yen'], '¥') ?> |
    AUD <?= format_price($global_prices_chocolates['aud'], 'A$') ?> |
    CAD <?= format_price($global_prices_chocolates['cad'], 'C$') ?>)
</p>

<h2>Caramelos</h2>
<p>US $<?= format_price($us_price_caramelos, '$') ?></p>
<p>
    (UK &pound; <?= format_price($global_prices_caramelos['pound'], '£') ?> |
    EU &euro; <?= format_price($global_prices_caramelos['euro'], '€') ?> |
    JP &yen; <?= format_price($global_prices_caramelos['yen'], '¥') ?> |
    AUD <?= format_price($global_prices_caramelos['aud'], 'A$') ?> |
    CAD <?= format_price($global_prices_caramelos['cad'], 'C$') ?>)
</p>

<h2>Galletas</h2>
<p>US $<?= format_price($us_price_galletas, '$') ?></p>
<p>
    (UK &pound; <?= format_price($global_prices_galletas['pound'], '£') ?> |
    EU &euro; <?= format_price($global_prices_galletas['euro'], '€') ?> |
    JP &yen; <?= format_price($global_prices_galletas['yen'], '¥') ?> |
    AUD <?= format_price($global_prices_galletas['aud'], 'A$') ?> |
    CAD <?= format_price($global_prices_galletas['cad'], 'C$') ?>)
</p>

<table border="1">
    <thead>
    <tr>
        <th>Producto</th>
        <th>US $</th>
        <th>UK &pound;</th>
        <th>EU &euro;</th>
        <th>JP &yen;</th>
        <th>AUD A$</th>
        <th>CAD C$</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Chocolates</td>
        <td><?= format_price($us_price_chocolates, '$') ?></td>
        <td><?= format_price($global_prices_chocolates['pound'], '£') ?></td>
        <td><?= format_price($global_prices_chocolates['euro'], '€') ?></td>
        <td><?= format_price($global_prices_chocolates['yen'], '¥') ?></td>
        <td><?= format_price($global_prices_chocolates['aud'], 'A$') ?></td>
        <td><?= format_price($global_prices_chocolates['cad'], 'C$') ?></td>
    </tr>
    <tr>
        <td>Caramelos</td>
        <td><?= format_price($us_price_caramelos, '$') ?></td>
        <td><?= format_price($global_prices_caramelos['pound'], '£') ?></td>
        <td><?= format_price($global_prices_caramelos['euro'], '€') ?></td>
        <td><?= format_price($global_prices_caramelos['yen'], '¥') ?></td>
        <td><?= format_price($global_prices_caramelos['aud'], 'A$') ?></td>
        <td><?= format_price($global_prices_caramelos['cad'], 'C$') ?></td>
    </tr>
    <tr>
        <td>Galletas</td>
        <td><?= format_price($us_price_galletas, '$') ?></td>
        <td><?= format_price($global_prices_galletas['pound'], '£') ?></td>
        <td><?= format_price($global_prices_galletas['euro'], '€') ?></td>
        <td><?= format_price($global_prices_galletas['yen'], '¥') ?></td>
        <td><?= format_price($global_prices_galletas['aud'], 'A$') ?></td>
        <td><?= format_price($global_prices_galletas['cad'], 'C$') ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>
