<?php
$stock = 25;

if ($stock >= 10){
    $message = "Good availability";
} if ($stock > 0 && $stock < 10){
    $message = "Low stock";
} if ($stock == 0){
    $message = "Out of stock";
}
?>
<?php require_once '../Recursos A2/includes/header.php';?>

<h2>Chocolate</h2>
<p><?= $message ?></p>

<?php include '../Recursos A2/includes/footer.php';?>
