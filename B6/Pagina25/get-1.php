<!-- Página 25 -->

<!-- PHP -->
<?php
$cities = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC' => '1242 7th Street, 10492',
];

$city = $_GET['city'];
$address = $cities[$city];
?>

<!-- HTML -->
<?php include '../Importes/header.php' ?>
<?php foreach ($cities as $ciudad => $valor) { ?>
    <a href="get-1.php?city=<?= $ciudad ?>"><?= $ciudad ?></a>
<?php } ?>

<h1><?= $city ?></h1>
<p><?= $address ?></p>

<?php include '../Importes/footer.php' ?>