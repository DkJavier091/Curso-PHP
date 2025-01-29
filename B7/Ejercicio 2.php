<?php
$alerta = '';
$movido = false;

$ruta_subida = 'uploads/';                 // Directorio para subir archivos
$formatos_permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/heif'];
$tamano_max = 10485760;                   // Tamaño máximo de archivo (10MB)

// Este ejercicio permite a los usuarios subir imágenes a un servidor web. 
// El archivo se valida para asegurar que sea un tipo y tamaño de archivo permitido, 
// se genera un nombre único para evitar sobrescribir archivos existentes, 
// y luego se mueve el archivo al directorio de destino. 
// Si hay algún error durante este proceso, se muestra un mensaje de alerta adecuado.

// Verificar si se envió el formulario mediante POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['archivo_imagen']['error'] === 0) {  // Sin errores en la carga del archivo
        // Verificar el tamaño del archivo
        if ($_FILES['archivo_imagen']['size'] > $tamano_max) {
            $alerta = '<p>El archivo es demasiado grande. El tamaño máximo permitido es 10MB.</p>';
        } else {
            // Validar tipo MIME
            $mime_archivo = mime_content_type($_FILES['archivo_imagen']['tmp_name']);
            if (!in_array($mime_archivo, $formatos_permitidos)) {
                $alerta = '<p>Tipo de archivo no permitido. Solo se permiten imágenes JPEG, PNG, GIF y HEIF.</p>';
            } else {
                // Generar un nombre único para evitar sobrescribir
                $nombre_unico = uniqid() . '-' . basename($_FILES['archivo_imagen']['name']);
                $ruta_destino = $ruta_subida . $nombre_unico;  // Ruta de destino

                // Mover el archivo al directorio de destino
                $movido = move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $ruta_destino);

                // Verificar si el archivo se movió correctamente
                if ($movido) {
                    $alerta = '<p>El archivo se ha subido correctamente:</p>';
                    $alerta .= '<img src="' . $ruta_subida . $nombre_unico . '" alt="Imagen subida" style="max-width:300px;">';
                } else {
                    $alerta = '<p>No se pudo guardar el archivo. Por favor, verifica los permisos del servidor.</p>';
                }
            }
        }
    } else {
        // Manejar errores de carga de archivo
        $alerta = '<p>Error en la carga del archivo. Código de error: ' . $_FILES['archivo_imagen']['error'] . '</p>';
    }
}
?>

<h1>Subir una Imagen de Perfil</h1>

<!-- Alerta para el usuario -->
<?= $alerta ?>

<!-- Formulario para subir imágenes -->
<form method="POST" action="Ejercicio_2.php" enctype="multipart/form-data">
    <label for="archivo_imagen"><b>Selecciona una imagen:</b></label><br>
    <input type="file" name="archivo_imagen" accept="image/*" id="archivo_imagen" required><br><br>
    <input type="submit" value="Subir imagen">
</form>