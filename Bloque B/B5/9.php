<?php
$logged_in = false;
if ($logged_in == false) {
    header('Location: login.php');
    exit;
}
?>
<?php include 'includes/header.php'; ?>
<h1>Members Area</h1>
<p>Bienvenido a la zona de miembros</p>
<h1>Iniciar Sesión</h1>
<?php include 'includes/footer.php'; ?>