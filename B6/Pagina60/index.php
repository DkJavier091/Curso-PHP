<?php
$cities  = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC'    => '1242 7th Street, 10492',
];
$city  = $_GET['city'] ?? '';
$valid = array_key_exists($city, $cities);

if (!$valid) {
    http_response_code(404);
    header('Location: 404.php');
    exit;
}
$address = $cities[$city];
?>
<?php include '../Importes/header.php'; ?>

<?php foreach ($cities as $ciudad => $value) { ?>
    <a href="index.php?city=<?= $ciudad ?>"><?= $ciudad ?></a>
<?php } ?>

<h1><?= $city ?></h1>
<p><?= $address ?></p>

<?php include '../Importes/footer.php' ?>