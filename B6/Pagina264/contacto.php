<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        $nombre = '';
        $email = '';
        $telefono = '';
        $mensaje = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filters = [
                'email' => FILTER_SANITIZE_EMAIL,
                'telefono' => FILTER_SANITIZE_NUMBER_INT,
            ];

            $form_data = filter_input_array(INPUT_POST, $filters);

            $nombre = htmlspecialchars(strip_tags($_POST['nombre']));
            $email = filter_var($form_data['email'], FILTER_VALIDATE_EMAIL) ? $form_data['email'] : '';
            $telefono = filter_var($form_data['telefono'], FILTER_VALIDATE_INT) ? $form_data['telefono'] : '';
            $mensaje = htmlspecialchars(strip_tags($_POST['mensaje']));
        }
        ?>

        <h1>Formulario de Contacto</h1>
        <form action="contacto.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required value="<?= htmlspecialchars($nombre) ?>">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($email) ?>">

            <label for="telefono">Número de Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required value="<?= htmlspecialchars($telefono) ?>">

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required><?= htmlspecialchars($mensaje) ?></textarea>

            <input type="submit" value="Enviar">
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
            <h2>Datos Saneados</h2>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Teléfono:</strong> <?= htmlspecialchars($telefono) ?></p>
            <p><strong>Mensaje:</strong> <?= nl2br(htmlspecialchars($mensaje)) ?></p>
        <?php endif; ?>
    </div>
</body>

</html>