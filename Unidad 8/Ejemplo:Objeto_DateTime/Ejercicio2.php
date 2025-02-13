<?php
#Código de ejemplo de la actividad
$inicio = new DateTime('2021-01-01 00:00');
$fin = date_create_from_format('Y-m-d H:i', '2021-02-01 00:00');


$fecha = '06-05-2001 9:00:00'; # Formato Dia-Mes-Año Hora-Minutos-Segundos.
$msgError = "Error: La fecha '$fecha' tiene un formato no valido,
\nse espera el paso de datos como dia, mes, año, hora, minutos, segundos.";

# Formateo de la fecha
# Función flecha, recoge el resultado en frtFecha, donde la función se le pasa por parametro una fecha
# este disparador, guarda en la variable objFecha el resultado del metodo datecreatefromformat, en caso de ejecutarse
# de no ser así guarda el mensaje de error (Para el dev), y devuelve uno formateado para el usuario.
$frtFecha = fn ($fecha) => ($objFecha = date_create_from_format('d-m-Y H:i:s', $fecha))
? $objFecha
: ($msgError);

# Llamar la función una sola vez y almacenar el resultado
$fechaFormateada = $frtFecha($fecha);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Capitulo 8 Ejemplos</title>
        <!--Fuentes importadas-->
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <!--Hoja de estilos-->
        <link href="../recursos/estilos/styles.css" rel="stylesheet">
    </head>

    <div class="page">
        <body>
                <header>
                    <a href="ejemplo.php"><img src="../recursos/imagenes/logo.png" alt="Fondo de arte en montañas" height="90"></a>
                    <p>
<!--Ejemplo de llamadas-->
                        <b>Sale starts:</b>
                        <?= $inicio->format('l, jS M Y H:i') ?>
                    </p>
                    <p>
                        <b>Sale ends:</b>
                        <?= $fin->format('l, jS M Y')?> <b>at</b>
                        <?= $fin->format('H:i')?>
                    </p>
<!--Fin del ejemplo-->
                    <p>
                        <b>Fecha:</b>
<!--La expresión `instanceof` 
se utiliza para verificar si una variable 
es una instancia de una clase específica.-->
                        <?= ($frtFecha($fecha) instanceof DateTime) ?
                            $fechaFormateada->format('Y-m-d H:i:s') :
                            $msgError;?>
                        <br>
                        <b>Formato Unix:</b>
                        <?= ($frtFecha($fecha) instanceof DateTime) ?
                            $fechaFormateada->getTimestamp() :
                            $msgError;?>
                        <br>
                        <b>Fecha escrita:</b>
<!-- \d\e es un texto literal para escribir “de” en el formato adecuado.-->
                        <?= ($frtFecha($fecha) instanceof DateTime) ?
                            $fechaFormateada->format('j \d\e F \d\e Y H:i') :
                            $msgError;?>
                    </p>
                </header>
        </body>    
        <footer>
            &copy; <?php echo date('Y')?>
        </footer>
    </div>
</html>
