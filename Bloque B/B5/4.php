<!-- Ejemplo: Uso de funciones de cadenas multibyte -->

<?php
// Variable con texto en varios idiomas incluyendo ruso y coreano
$text = 'Hello Привет 안녕';

// Explicación:
// strlen() cuenta el número de bytes en la cadena, lo que puede no ser exacto para caracteres multibyte.
// mb_strlen() cuenta el número de caracteres, independientemente de cuántos bytes se utilicen para representarlos.
// strpos() y mb_strpos() se utilizan para encontrar la posición de una subcadena, pero strpos() no maneja bien los caracteres multibyte.
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h2>Ejemplo de funciones de cadenas multibyte</h2>

<p><b>Texto original:</b> <?= $text; ?></p>

<p><b>Recuento de caracteres usando <code>strlen()</code>:</b> <?= strlen($text); ?></p>
<p><b>Recuento de caracteres usando <code>mb_strlen()</code>:</b> <?= mb_strlen($text, 'UTF-8'); ?></p>

<p><b>Posición de "Привет" usando <code>strpos()</code>:</b> <?= strpos($text, 'Привет'); ?></p>
<p><b>Posición de "Привет" usando <code>mb_strpos()</code>:</b> <?= mb_strpos($text, 'Привет', 0, 'UTF-8'); ?></p>

<?php include './includes/footer.php'; ?>