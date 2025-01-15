<a class="badlink" href="index.php?msg=<script src=../JavaScript/mal.js></script>">
    Escape de marcas</a>

<?php
function html_escape(string $cadena): string
{
    return htmlspecialchars(
        $cadena,
        ENT_QUOTES | ENT_HTML5,
        'UTF-8',
        true
    );
}
?>
<?php
$mensaje = $_GET['msg'] ?? 'Click the link above';
?>
<?php include '../Importes/header.php' ?>

<h1>XSS Ejemplo</h1>
<p><?= $mensaje ?></p> <!-- Eliminamos el escape de caracteres aquí -->

<?php include '../Importes/footer.php' ?>