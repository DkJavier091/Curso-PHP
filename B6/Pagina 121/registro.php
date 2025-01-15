<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Jugadores</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST['nombre']);
            $apellido = htmlspecialchars($_POST['apellido']);
            $edad = htmlspecialchars($_POST['edad']);
            $posicion = htmlspecialchars($_POST['posicion']);

            echo '<div class="confirmation">';
            echo "<h2>Registro Completo</h2>";
            echo "<p><strong>Nombre:</strong> <span>$nombre</span></p>";
            echo "<p><strong>Apellido:</strong> <span>$apellido</p>";
            echo "<p><strong>Edad:</strong> <span>$edad</p>";
            echo "<p><strong>Posición:</strong> <span>$posicion</p>";
            echo '</div>';
        } else {
        ?>
            <h1>Formulario de Registro</h1>
            <form action="registro.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" required>

                <label for="posicion">Posición:</label>
                <select id="posicion" name="posicion" required>
                    <option value="portero">Portero</option>
                    <option value="defensa">Defensa</option>
                    <option value="centrocampista">Centrocampista</option>
                    <option value="delantero">Delantero</option>
                </select>

                <input type="submit" value="Registrar">
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>