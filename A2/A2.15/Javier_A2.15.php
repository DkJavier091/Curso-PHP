<?php include_once 'includes/header.php'; ?>
<link rel="stylesheet" href="styles/style.css">

<?php

$name = "Pedro";
$saludo = "Welcoming " . $name;

$bienvenida = ($name) ? $saludo : "Bienvenido";

$deportes = [
    'Futbol' => 7.99,
    'Baloncesto' => 5.55,
    'Tiro al arco' => 8.15,
];

$coste = 10; //Coste mensual.

for($i = 0; $i < 20; $i++) {
    $subtotal = $coste * $i;
    $descuento = ($subtotal / 100) * ($i * 0.05);
    $total[$i] = $subtotal - $descuento;
}
?>

<?= $bienvenida; ?>

<table>
    <tr>
        <th>Deportes</th>
        <th>Precios</th>
    </tr>
    <?php foreach ($deportes as $nombres => $price) {?>
        <tr>
            <td>
                <?= $nombres ?>
                pack<?= ($nombres === 1) ? '' : 's'; ?>
            </td>
            <td>
                $<?= $price; ?>
            </td>
        </tr>
    <?php } ?>
</table>

