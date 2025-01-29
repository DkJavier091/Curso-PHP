<?php
$archivo_movido = false;                             // Bandera para verificar si el archivo se movió
$notificacion = '';                                  // Mensaje para notificaciones
$error_carga = '';                                   // Mensaje para errores
$directorio_destino = 'uploads/';                    // Directorio de destino para los archivos subidos
$tamano_maximo_archivo = 5242880;                   // Tamaño máximo permitido para los archivos (5MB)
$tipos_archivo_permitidos = ['image/jpeg', 'image/png', 'image/gif'];  // Tipos MIME permitidos
$extensiones_permitidas = ['jpeg', 'jpg', 'png', 'gif'];              // Extensiones de archivo permitidas

// Función para limpiar y generar un nombre de archivo único
function generar_nombre_archivo($nombre_original, $directorio_destino)
{
    $nombre_base = preg_replace('/[^A-z0-9]/', '-', pathinfo($nombre_original, PATHINFO_FILENAME)); // Limpiar caracteres especiales
    $extension = pathinfo($nombre_original, PATHINFO_EXTENSION);                                    // Obtener extensión del archivo
    $nombre_limpio = $nombre_base . '.' . $extension;                                               // Reconstruir nombre de archivo limpio
    $contador = 0;                                                                                   // Contador para evitar duplicados
    while (file_exists($directorio_destino . $nombre_limpio)) {                                     // Si el archivo ya existe
        $contador++;                                                                               // Incrementar contador
        $nombre_limpio = $nombre_base . $contador . '.' . $extension;                              // Generar nuevo nombre de archivo
    }
    return $nombre_limpio;                                                                         // Retornar nombre de archivo único
}

// Función para redimensionar y recortar imágenes
function procesar_imagen($ruta_origen, $ruta_destino, $ancho_deseado, $alto_deseado)
{
    $informacion_imagen = getimagesize($ruta_origen);                        // Obtener información de la imagen
    $ancho_origen = $informacion_imagen[0];                                  // Ancho de la imagen original
    $alto_origen = $informacion_imagen[1];                                   // Alto de la imagen original
    $tipo_mime = $informacion_imagen['mime'];                                // Tipo MIME de la imagen
    $relacion_aspecto_origen = $ancho_origen / $alto_origen;                 // Relación de aspecto de la imagen original
    $relacion_aspecto_deseada = $ancho_deseado / $alto_deseado;              // Relación de aspecto deseada

    // Calcular dimensiones para el recorte
    if ($relacion_aspecto_deseada < $relacion_aspecto_origen) {
        $ancho_seleccionado = $alto_origen * $relacion_aspecto_deseada;      // Nuevo ancho
        $alto_seleccionado = $alto_origen;                                   // Alto se mantiene igual
        $desplazamiento_x = ($ancho_origen - $ancho_seleccionado) / 2;       // Desplazamiento en X
        $desplazamiento_y = 0;                                               // Sin desplazamiento en Y
    } else {
        $ancho_seleccionado = $ancho_origen;                                 // Ancho se mantiene igual
        $alto_seleccionado = $ancho_origen / $relacion_aspecto_deseada;      // Nuevo alto
        $desplazamiento_x = 0;                                               // Sin desplazamiento en X
        $desplazamiento_y = ($alto_origen - $alto_seleccionado) / 2;         // Desplazamiento en Y
    }

    // Crear imagen base según tipo MIME
    switch ($tipo_mime) {
        case 'image/gif':
            $imagen_origen = imagecreatefromgif($ruta_origen);
            break;
        case 'image/jpeg':
            $imagen_origen = imagecreatefromjpeg($ruta_origen);
            break;
        case 'image/png':
            $imagen_origen = imagecreatefrompng($ruta_origen);
            imagealphablending($imagen_origen, false);
            imagesavealpha($imagen_origen, true);
            break;
    }

    $imagen_destino = imagecreatetruecolor($ancho_deseado, $alto_deseado);    // Crear imagen destino vacía
    if ($tipo_mime === 'image/png') {
        imagealphablending($imagen_destino, false);
        imagesavealpha($imagen_destino, true);
    }

    // Redimensionar y recortar la imagen
    imagecopyresampled(
        $imagen_destino,
        $imagen_origen,
        0,
        0,
        $desplazamiento_x,
        $desplazamiento_y,
        $ancho_deseado,
        $alto_deseado,
        $ancho_seleccionado,
        $alto_seleccionado
    );

    // Guardar imagen en el formato correcto
    switch ($tipo_mime) {
        case 'image/gif':
            return imagegif($imagen_destino, $ruta_destino);
        case 'image/jpeg':
            return imagejpeg($imagen_destino, $ruta_destino);
        case 'image/png':
            return imagepng($imagen_destino, $ruta_destino);
    }
    return false;
}

// Procesar la carga del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Manejo de errores de carga de archivo
    $error_carga = ($_FILES['imagen_producto']['error'] === 1) ? 'El archivo es demasiado grande. ' : '';

    if ($_FILES['imagen_producto']['error'] == 0) {
        // Validar tamaño de archivo
        $error_carga .= ($_FILES['imagen_producto']['size'] <= $tamano_maximo_archivo) ? '' : 'El archivo supera los 10MB. ';

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