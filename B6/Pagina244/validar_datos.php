<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Formulario</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        $form['email'] = '';    // Inicializar email
        $form['edad'] = '';     // Inicializar edad
        $form['url'] = '';      // Inicializar URL
        $form['terminos'] = ''; // Inicializar términos

        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si se envió el formulario
            $filters = [
                'email' => FILTER_VALIDATE_EMAIL,
                'edad' => [
                    'filter' => FILTER_VALIDATE_INT,
                    'options' => [
                        'min_range' => 18,
                        'max_range' => 65
                    ]
                ],
                'url' => FILTER_VALIDATE_URL,
                'terminos' => [
                    'filter' => FILTER_VALIDATE_BOOLEAN,
                    'flags' => FILTER_NULL_ON_FAILURE
                ]
            ];

            $form = filter_input_array(INPUT_POST, $filters); // Validar datos
        }

        $mensaje = '';

        // Comprobar resultados de la validación
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form['email'] && $form['edad'] && $form['url'] && $form['terminos']) {
                $mensaje = "Formulario válido. Información ingresada:<br>
                            Email: " . htmlspecialchars($form['email']) . "<br>
                            Edad: " . htmlspecialchars($form['edad']) . "<br>
                            URL: " . htmlspecialchars($form['url']) . "<br>
                            Términos aceptados: Sí<br>";
            } else {
                $mensaje = "Por favor, ingresa información válida en todos los campos.<br>";

                if (!$form['email']) {
                    $mensaje .= "Email inválido.<br>";
                }
                if (!$form['edad']) {
                    $mensaje .= "Edad fuera del rango permitido (18-65 años).<br>";
                }
                if (!$form['url']) {
                    $mensaje .= "URL inválida.<br>";
                }
                if ($form['terminos'] === null || $form['terminos'] === false) {
                    $mensaje .= "Debe aceptar los términos y condiciones.<br>";
                }
            }
        }
        ?>

        <h1>Validación de Formulario</h1>
        <form action="validar_datos.php" method="POST">
            <label for="email">Correo Electrónico:</label>
            <input type="text" id="email" name="email" required value="<?= htmlspecialchars($form['email']) ?>">

            <label for="edad">Edad (entre 18 y 65 años):</label>
            <input type="text" id="edad" name="edad" required value="<?= htmlspecialchars($form['edad']) ?>">

            <label for="url">URL del Sitio Web:</label>
            <input type="text" id="url" name="url" required value="<?= htmlspecialchars($form['url']) ?>">

            <label>
                <input type="checkbox" name="terminos" value="1" <?= $form['terminos'] ? 'checked' : '' ?>>
                Acepto los términos y condiciones
            </label>

            <input type="submit" value="Enviar">
        </form>

        <p><?= $mensaje ?></p>
    </div>
</body>

</html>