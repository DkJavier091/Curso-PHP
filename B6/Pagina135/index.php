<?php

declare(strict_types=1);
$age     = '';
$message = '';

function is_number($number, int $min = 0, int $max = 100): bool
{
    return ($number >= $min and $number <= $max);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $age   = $_POST['age'];
    $valid = is_number($age, 8, 16); // Cambio de rango de 8 a 16
    if ($valid) {
        $message = 'La edad es válida';
    } else {
        $message = 'Debes tener entre 8 y 16 años';
    }
}
?>
<?php include '../Importes/header.php'; ?>

<?= $message ?>
<form action="index.php" method="POST">
    Edad: <input type="text" name="age" size="4" value="<?= htmlspecialchars($age) ?>">
    <input type="submit" value="Guardar">
</form>

<?php include '../Importes/footer.php'; ?>