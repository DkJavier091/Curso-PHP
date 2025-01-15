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
        // Inicializar variables
        $nombre = '';
        $email = '';
        $telefono = '';
        $tipo_evento = '';
        $terminos = false;
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Definir filtros de validación
            $filters = [
                'nombre' => [
                    'filter' => FILTER_CALLBACK,
                    'options' => function ($value) {
                        return preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{2,50}$/', $value) ? $value : false;
                    }
                ],
                'email' => FILTER_VALIDATE_EMAIL,
                'telefono' => [
                    'filter' => FILTER_CALLBACK,
                    'options' => function ($value) {
                        return preg_match('/^[0-9]{9,}$/', $value) ? $value : false;
                    }
                ],
                'tipo_evento' => [
                    'filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^(Presencial|Online)$/']
                ],
                'terminos' => [
                    'filter' => FILTER_VALIDATE_BOOLEAN,
                    'flags' => FILTER_NULL_ON_FAILURE
                ]
            ];

            // Obtener y validar datos
            $form_data = filter_input_array(INPUT_POST, $filters);

            // Saneamiento de datos
            $nombre = filter_var($form_data['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($form_data['email'], FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($form_data['telefono'], FILTER_SANITIZE_NUMBER_INT);
            $tipo_evento = $form_data['tipo_evento'];
            $terminos = $form_data['terminos'];

            // Validar datos
            if (!$nombre) {
                $errores[] = "Nombre inválido. Debe contener solo letras y tener entre 2 y 50 caracteres.";
            }
            if (!$email) {
                $errores[] = "Correo electrónico inválido.";
            }
            if (!$telefono) {
                $errores[] = "Teléfono inválido. Debe contener solo números y tener al menos 9 dígitos.";
            }
            if (!$tipo_evento) {
                $errores[] = "Debe seleccionar un tipo de evento válido.";
            }
            if ($terminos === null || $terminos === false) {
                $errores[] = "Debe aceptar los términos y condiciones.";
            }

            // Si no hay errores, mostrar mensaje de éxito
            if (empty($errores)) {
                echo "<p>Registro exitoso:</p>";
                echo "<p>Nombre: " . htmlspecialchars($nombre) . "</p>";
                echo "<p>Email: " . htmlspecialchars($email) . "</p>";
                echo "<p>Teléfono: " . htmlspecialchars($telefono) . "</p>";
                echo "<p>Tipo de evento: " . htmlspecialchars($tipo_evento) . "</p>";
                echo "<p>Términos aceptados: Sí</p>";
            }
        }
        ?>

        <h1>Registro de Evento</h1>
        <form action="final.php" method="POST">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" required value="<?= htmlspecialchars($nombre) ?>">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($email) ?>">

            <label for="telefono">Teléfono de Contacto:</label>
            <input type="text" id="telefono" name="telefono" required value="<?= htmlspecialchars($telefono) ?>">

            <label for="tipo_evento">Tipo de Evento:</label>
            <select id="tipo_evento" name="tipo_evento" required>
                <option value="">Selecciona una opción</option>
                <option value="Presencial" <?= $tipo_evento == 'Presencial' ? 'selected' : '' ?>>Presencial</option>
                <option value="Online" <?= $tipo_evento == 'Online' ? 'selected' : '' ?>>Online</option>
            </select>

            <label>
                <input type="checkbox" name="terminos" value="1" <?= $terminos ? 'checked' : '' ?>>
                Acepto los términos y condiciones
            </label>

            <input type="submit" value="Registrar">
        </form>

        <?php
        // Mostrar errores
        if (!empty($errores)) {
            echo "<div class='errores'><ul>";
            foreach ($errores as $error) {
                echo "<li>" . htmlspecialchars($error) . "</li>";
            }
            echo "</ul></div>";
        }
        ?>
    </div>
</body>

</html>