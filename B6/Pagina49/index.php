<?php
$cities  = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC'    => '1242 7th Street, 10492',
    'Tokio'  => 'Shibuya Crossing, Shibuya City, Tokyo',
];

$city = $_GET['city'] ?? '';
if ($city && isset($cities[$city])) {
    $address = $cities[$city];
} else {
    $address = 'Please select a valid city';
    $city = 'Invalid city';
}

include '../Importes/header.php';
?>

<?php foreach ($cities as $ciudad => $value) { ?>
    <a href="index.php?city=<?= $ciudad ?>"><?= $ciudad ?></a>
<?php } ?>

<h1><?= htmlspecialchars($city, ENT_QUOTES, 'UTF-8') ?></h1>
<p><?= htmlspecialchars($address, ENT_QUOTES, 'UTF-8') ?></p>

<?php include '../Importes/footer.php'; ?>