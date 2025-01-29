<?php
$archivo_movido = false;
$notificacion = '';
$error_carga = '';
$directorio_destino = 'uploads/';
$tamano_maximo_archivo = 5242880;  // 5MB
$tipos_archivo_permitidos = ['image/jpeg', 'image/png', 'image/gif'];
$extensiones_permitidas = ['jpeg', 'jpg', 'png', 'gif'];

// Limpiar y generar un nombre único para el archivo
function generar_nombre_archivo($nombre_original, $directorio_destino)
{
    $nombre_base = preg_replace('/[^A-z0-9]/', '-', pathinfo($nombre_original, PATHINFO_FILENAME));
    $extension = pathinfo($nombre_original, PATHINFO_EXTENSION);
    $nombre_limpio = $nombre_base . '.' . $extension;
    $contador = 0;
    while (file_exists($directorio_destino . $nombre_limpio)) {
        $contador++;
        $nombre_limpio = $nombre_base . $contador . '.' . $extension;
    }
    return $nombre_limpio;
}

// Redimensionar y recortar imagen usando Imagick
function procesar_imagen($ruta_origen, $ruta_destino, $ancho_deseado, $alto_deseado)
{
    $imagen = new Imagick($ruta_origen);
    $ancho_origen = $imagen->getImageWidth();
    $alto_origen = $imagen->getImageHeight();
    $relacion_aspecto_origen = $ancho_origen / $alto_origen;
    $relacion_aspecto_deseada = $ancho_deseado / $alto_deseado;

    if ($relacion_aspecto_deseada < $relacion_aspecto_origen) {
        $ancho_seleccionado = $alto_origen * $relacion_aspecto_deseada;
        $alto_seleccionado = $alto_origen;
        $desplazamiento_x = ($ancho_origen - $ancho_seleccionado) / 2;
        $desplazamiento_y = 0;
    } else {
        $ancho_seleccionado = $ancho_origen;
        $alto_seleccionado = $ancho_origen / $relacion_aspecto_deseada;
        $desplazamiento_x = 0;
        $desplazamiento_y = ($alto_origen - $alto_seleccionado) / 2;
    }

    $imagen->cropImage($ancho_seleccionado, $alto_seleccionado, $desplazamiento_x, $desplazamiento_y);
    $imagen->thumbnailImage($ancho_deseado, $alto_deseado);

    // Guardar imagen redimensionada
    return $imagen->writeImage($ruta_destino);
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error_carga = ($_FILES['imagen_producto']['error'] === 1) ? 'El archivo es demasiado grande. ' : '';

    if ($_FILES['imagen_producto']['error'] == 0) {
        // Validar tamaño de archivo
        $error_carga .= ($_FILES['imagen_producto']['size'] <= $tamano_maximo_archivo) ? '' : 'El archivo supera los 5MB. ';

        // Validar tipo MIME del archivo
        $tipo_archivo = mime_content_type($_FILES['imagen_producto']['tmp_name']);
        $error_carga .= in_array($tipo_archivo, $tipos_archivo_permitidos) ? '' : 'El tipo de archivo no es permitido. ';

        // Validar extensión del archivo
        $extension_archivo = strtolower(pathinfo($_FILES['imagen_producto']['name'], PATHINFO_EXTENSION));
        $error_carga .= in_array($extension_archivo, $extensiones_permitidas) ? '' : 'La extensión del archivo no es válida. ';

        if (!$error_carga) {
            // Generar nombre único y mover el archivo
            $nombre_archivo = generar_nombre_archivo($_FILES['imagen_producto']['name'], $directorio_destino);
            $ruta_destino = $directorio_destino . $nombre_archivo;
            $directorio_miniaturas = $directorio_destino . 'thumbs/';
            if (!file_exists($directorio_miniaturas)) mkdir($directorio_miniaturas, 0777, true);
            $ruta_miniatura = $directorio_miniaturas . $nombre_archivo;

            // Mover archivo y crear miniatura
            $archivo_movido = move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $ruta_destino);
            $miniatura_creada = procesar_imagen($ruta_destino, $ruta_miniatura, 200, 200);
        }
    }

    // Mensajes de resultado
    if ($archivo_movido && $miniatura_creada) {
        $notificacion = '<img src="' . $ruta_miniatura . '">';
    } else {
        $notificacion = '<b>No se pudo subir el archivo:</b> ' . $error_carga;
    }
}
?>

<?php include 'includes/header.php' ?>
<?= $notificacion ?>
<form method="POST" action="Ejercicio_4.php" enctype="multipart/form-data">
    <label for="imagen_producto"><b>Subir archivo:</b></label>
    <input type="file" name="imagen_producto" accept="image/*" id="imagen_producto"><br>
    <input type="submit" value="Subir">
</form>
<?php include 'includes/footer.php' ?>