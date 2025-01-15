<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Evento</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        $email = '';
        $age = '';
        $newsletter = false;
        $mensaje = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validar correo electrónico
            if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email = htmlspecialchars($_POST['email']);
            } else {
                $mensaje = "Por favor, ingresa un correo electrónico válido.<br>";
            }

            // Validar edad
            if (isset($_POST['age']) && is_numeric($_POST['age']) && $_POST['age'] > 0) {
                $age = (int) htmlspecialchars($_POST['age']);
            } else {
                $mensaje .= "Por favor, ingresa una edad válida.<br>";
            }

            // Validar interés en recibir boletines
            $newsletter = isset($_POST['newsletter']);

            if ($mensaje == '') {
                $mensaje = "Registro completado con éxito:<br>";
                $mensaje .= "Correo electrónico: $email<br>";
                $mensaje .= "Edad: $age<br>";
                $mensaje .= "Interés en recibir boletines: " . ($newsletter ? 'Sí' : 'No') . "<br>";
            }
        }
        ?>

        <h1>Registro de Evento</h1>
        <form action="registro_evento.php" method="POST">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($email) ?>">

            <label for="age">Edad:</label>
            <input type="number" id="age" name="age" required value="<?= htmlspecialchars($age) ?>">

            <label>
                <input type="checkbox" name="newsletter" <?= $newsletter ? 'checked' : '' ?>>
                ¿Deseas recibir boletines?
            </label>

            <input type="submit" value="Registrar">
        </form>

        <p><?= $mensaje ?></p>
    </div>
</body>

</html>