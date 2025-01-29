<?php
$subido = false;
$mensaje = '';
$error = '';
$directorio_subida = 'uploads/';
$tamano_maximo = 5242880;                                // Tamaño máximo de archivo (5 MB)
$tipos_permitidos = ['image/jpeg', 'image/png', 'image/gif'];  // Tipos MIME permitidos
$extensiones_permitidas = ['jpeg', 'jpg', 'png', 'gif'];       // Extensiones permitidas

// Función para limpiar nombres de archivo y evitar sobreescrituras
function crear_nombre_archivo($nombre_archivo, $directorio_subida)
{
    $nombre_base = pathinfo($nombre_archivo, PATHINFO_FILENAME);
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
    $nombre_base = preg_replace('/[^A-z0-9]/', '-', $nombre_base);     // Limpiamos caracteres especiales
    $nombre_archivo = $nombre_base . '.' . $extension;                 // Reconstruimos el nombre limpio
    $i = 0;
    while (file_exists($directorio_subida . $nombre_archivo)) {        // Si el archivo ya existe
        $i++;
        $nombre_archivo = $nombre_base . $i . '.' . $extension;        // Generamos un nuevo nombre
    }
    return $nombre_archivo;                                            // Retornamos el nombre único
}

// Función para recortar y redimensionar imágenes
function recortar_y_redimensionar_imagen($ruta_origen, $ruta_nueva, $ancho_nuevo, $alto_nuevo)
{
    $datos_imagen = getimagesize($ruta_origen);                         // Obtenemos datos de la imagen
    $ancho_origen = $datos_imagen[0];                                   // Ancho original
    $alto_origen = $datos_imagen[1];                                    // Alto original
    $tipo_mime = $datos_imagen['mime'];                                 // Tipo MIME
    $relacion_origen = $ancho_origen / $alto_origen;
    $relacion_nueva = $ancho_nuevo / $alto_nuevo;

    // Calculamos las dimensiones para el recorte
    if ($relacion_nueva < $relacion_origen) {
        $ancho_seleccionado = $alto_origen * $relacion_nueva;
        $alto_seleccionado = $alto_origen;
        $desplazamiento_x = ($ancho_origen - $ancho_seleccionado) / 2;
        $desplazamiento_y = 0;
    } else {
        $ancho_seleccionado = $ancho_origen;
        $alto_seleccionado = $ancho_origen / $relacion_nueva;
        $desplazamiento_x = 0;
        $desplazamiento_y = ($alto_origen - $alto_seleccionado) / 2;
    }

    // Creamos la imagen base dependiendo del tipo
    switch ($tipo_mime) {
        case 'image/gif':
            $origen = imagecreatefromgif($ruta_origen);
            break;
        case 'image/jpeg':
            $origen = imagecreatefromjpeg($ruta_origen);
            break;
        case 'image/png':
            $origen = imagecreatefrompng($ruta_origen);
            break;
    }

    $nueva = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);
    imagecopyresampled(
        $nueva,
        $origen,
        0,
        0,
        $desplazamiento_x,
        $desplazamiento_y,
        $ancho_nuevo,
        $alto_nuevo,
        $ancho_seleccionado,
        $alto_seleccionado
    ); // Redimensionamos

    // Guardamos la imagen en el formato correcto
    switch ($tipo_mime) {
        case 'image/gif':
            $resultado = imagegif($nueva, $ruta_nueva);
            break;
        case 'image/jpeg':
            $resultado = imagejpeg($nueva, $ruta_nueva);
            break;
        case 'image/png':
            $resultado = imagepng($nueva, $ruta_nueva);
            break;
    }
    return $resultado;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                         // Si se envió el formulario
    $error = ($_FILES['imagen']['error'] === 1) ? 'Archivo demasiado grande ' : ''; // Error de tamaño

    if ($_FILES['imagen']['error'] == 0) {                          // Si no hubo errores de subida
        $error .= ($_FILES['imagen']['size'] <= $tamano_maximo) ? '' : 'Archivo excede el tamaño permitido ';
        $tipo = mime_content_type($_FILES['imagen']['tmp_name']);   // Tipo MIME
        $error .= in_array($tipo, $tipos_permitidos) ? '' : 'Tipo de archivo no permitido ';
        $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        $error .= in_array($extension, $extensiones_permitidas) ? '' : 'Extensión de archivo no permitida ';
        if (!$error) {
            $nombre_archivo = crear_nombre_archivo($_FILES['imagen']['name'], $directorio_subida);
            $ruta_destino = $directorio_subida . $nombre_archivo;
            $ruta_miniatura = $directorio_subida . 'thumb_' . $nombre_archivo;
            $subido = move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino);
            $redimensionado = recortar_y_redimensionar_imagen($ruta_destino, $ruta_miniatura, 200, 200);
        }
    }
    if ($subido === true && $redimensionado === true) {
        $mensaje = '<img src="' . $ruta_miniatura . '">';
    } else {
        $mensaje = '<b>No se pudo subir el archivo:</b> ' . $error;            // Mostramos errores
    }
}
?>

<?= $mensaje ?>
<form method="POST" action="Ejercicio_3.php" enctype="multipart/form-data">
    <label for="imagen"><b>Subir archivo:</b></label>
    <input type="file" name="imagen" accept="image/*" id="imagen"><br>
    <input type="submit" value="Subir">
</form>