<?php
// Definimos variables para simular datos de entrada del usuario
$nombre = 'Juanita';
$correo = 'juanita.email@example.com';
$mensaje = 'Hola, soy tu mejor amiga.';
// Creamos una variable para almacenar la cadena completa
$frase = "Nombre: $nombre <br> Correo: $correo <br> Mensaje: $mensaje<br>";

// Eliminamos los espacios en blanco adicionales al inicio y al final de las cadenas
$nombre = trim($nombre);
$correo = trim($correo);
$mensaje = trim($mensaje);

// Convertimos todo el correo a minúsculas para asegurar un formato consistente
$correo = strtolower($correo);

// Reemplazamos ciertas palabras en el mensaje (por ejemplo, 'amiga' por '****')
$mensaje = str_replace('amiga', '****', $mensaje);

// Reemplazamos 'mejor' por 'Prioridad Alta', sin importar mayúsculas/minúsculas
$mensaje = str_ireplace('mejor', 'Prioridad Alta', $mensaje);

// Añadimos "!!" al final del mensaje para enfatizar
$mensaje = str_repeat($mensaje . "!! <br>", 2);

// Creamos una variable para la cadena completa después del procesamiento
$fraseEditada = "Nombre: $nombre <br> Correo: $correo <br> Mensaje: $mensaje<br>";

?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<!-- Mostramos la salida de los datos originales -->
<?= $frase ?>

<br>
<hr><br>

<!-- Mostramos la salida de los datos procesados -->
<?= $fraseEditada ?>

<?php include './includes/footer.php'; ?>