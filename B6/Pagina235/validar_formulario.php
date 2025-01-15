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
        $email = '';
        $edad = '';
        $url = '';
        $terminos = '';
        $mensaje = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args = [
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

            $inputs = filter_input_array(INPUT_POST, $args);

            if ($inputs) {
                if ($inputs['email'] && $inputs['edad'] && $inputs['url'] && $inputs['terminos']) {
                    $email = htmlspecialchars($inputs['email']);
                    $edad = htmlspecialchars($inputs['edad']);
                    $url = htmlspecialchars($inputs['url']);
                    $terminos = $inputs['terminos'];
                    $mensaje = "Formulario válido. Información ingresada:<br>
                                Email: $email<br>
                                Edad: $edad<br>
                                URL: $url<br>
                                Términos aceptados: " . ($terminos ? 'Sí' : 'No') . "<br>";
                } else {
                    $mensaje = "Por favor, ingresa información válida en todos los campos.<br>";

                    if (!$inputs['email']) {
                        $mensaje .= "Email inválido.<br>";
                    }
                    if (!$inputs['edad']) {
                        $mensaje .= "Edad fuera del rango permitido (18-65 años).<br>";
                    }
                    if (!$inputs['url']) {
                        $mensaje .= "URL inválida.<br>";
                    }
                    if ($inputs['terminos'] === null || $inputs['terminos'] === false) {
                        $mensaje .= "Debe aceptar los términos y condiciones.<br>";
                    }
                }
            } else {
                $mensaje = "Error en la validación del formulario.";
            }
        }
        ?>

        <h1>Validación de Formulario</h1>
        <form action="validar_formulario.php" method="POST">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($email) ?>">

            <label for="edad">Edad (entre 18 y 65 años):</label>
            <input type="number" id="edad" name="edad" required value="<?= htmlspecialchars($edad) ?>">

            <label for="url">URL del Sitio Web:</label>
            <input type="url" id="url" name="url" required value="<?= htmlspecialchars($url) ?>">

            <label>
                <input type="checkbox" name="terminos" <?= $terminos ? 'checked' : '' ?>>
                Acepto los términos y condiciones
            </label>

            <input type="submit" value="Enviar">
        </form>

        <p><?= $mensaje ?></p>
    </div>
</body>

</html>