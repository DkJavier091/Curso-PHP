<?php
$mangas = [
    'Crush of lifetime 05' => "https://www.amazon.es/CRUSH-LIFETIME-05-HALIM-JEONG/dp/8467972432/?_encoding=UTF8&pd_rd_w=KJ8pr&content-id=amzn1.sym.8e0b9c93-ce4d-43a7-92b8-93ac944c3311%3Aamzn1.symc.fc11ad14-99c1-406b-aa77-051d0ba1aade&pf_rd_p=8e0b9c93-ce4d-43a7-92b8-93ac944c3311&pf_rd_r=Z0KG1ZTKSWZWCZ17R7V4&pd_rd_wg=vtiTZ&pd_rd_r=9af59b4e-88ef-4c22-88ba-8c5587adf050&ref_=pd_hp_d_atf_ci_mcx_mr_ca_hp_atf_d",
    'Como Raeliana acabo en la mansión del duque 01' => "https://www.amazon.es/COMO-RAELIANA-ACABO-MANSION-DUQUE/dp/8467962526/?_encoding=UTF8&pd_rd_w=KJ8pr&content-id=amzn1.sym.8e0b9c93-ce4d-43a7-92b8-93ac944c3311%3Aamzn1.symc.fc11ad14-99c1-406b-aa77-051d0ba1aade&pf_rd_p=8e0b9c93-ce4d-43a7-92b8-93ac944c3311&pf_rd_r=Z0KG1ZTKSWZWCZ17R7V4&pd_rd_wg=vtiTZ&pd_rd_r=9af59b4e-88ef-4c22-88ba-8c5587adf050&ref_=pd_hp_d_atf_ci_mcx_mr_ca_hp_atf_d",
    'La emperatriz abandonada 01' => "https://www.amazon.es/EMPERATRIZ-ABANDONADA-01-INA-YUNA/dp/8467958103/258-5781983-4951231?pd_rd_w=lMy5V&content-id=amzn1.sym.37be7bde-a412-4ecb-a457-15c7dd303a88:amzn1.symc.15cbde64-36a4-47c6-b315-5d1a0d7227bc&pf_rd_p=37be7bde-a412-4ecb-a457-15c7dd303a88&pf_rd_r=QSWAPVR8WTVJWEVW5DGC&pd_rd_wg=BW8lg&pd_rd_r=e6bdedca-9fff-49b7-a221-6ab08724d100&pd_rd_i=8467958103&psc=1"
];

include '../Importes/header.php';
?>

<h1>Compra manga 2025</h1>

<?php foreach ($mangas as $titular => $enlace) : ?>
    <a href="product.php?mangas=<?= urlencode($titular) ?>"><?= $titular ?></a> <!-- Usamos urlencode para manejar caracteres especiales. -->
    <br>
<?php endforeach; ?>

<?php include '../Importes/footer.php'; ?>