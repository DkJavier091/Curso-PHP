<?php
$cities  = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC'    => '1242 7th Street, 10492',
    'Tokio' => 'Shibuya Crossing, Shibuya City, Tokyo',
];
$city = $_GET['city'] ?? '';
if ($city) {
    $address = $cities[$city];
} else {
    $address = 'Please select a city';
}
?>
<?php include '../Importes/header.php' ?>

<?php foreach ($cities as $ciudad => $value) { ?>
    <a href="index.php?city=<?= $ciudad ?>"><?= $ciudad ?></a>
<?php } ?>

<h1><?= $city ?></h1>
<p><?= $address ?></p>

<?php include '../Importes/footer.php' ?>