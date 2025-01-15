<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaturas Optativas</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        $asignatura = '';
        $mensaje = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['asignatura'])) {
                $asignatura = htmlspecialchars($_POST['asignatura']);
                $mensaje = "Has seleccionado: $asignatura";
            } else {
                $mensaje = "Por favor, selecciona una asignatura.";
            }
        }
        ?>

        <h1>Selecciona una Asignatura Optativa</h1>
        <form action="optativas.php" method="POST">
            <p>
                <input type="radio" id="matematicas" name="asignatura" value="Matemáticas" <?= $asignatura == 'Matemáticas' ? 'checked' : '' ?>>
                <label for="matematicas">Matemáticas</label>
            </p>
            <p>
                <input type="radio" id="fisica" name="asignatura" value="Física" <?= $asignatura == 'Física' ? 'checked' : '' ?>>
                <label for="fisica">Física</label>
            </p>
            <p>
                <input type="radio" id="historia" name="asignatura" value="Historia" <?= $asignatura == 'Historia' ? 'checked' : '' ?>>
                <label for="historia">Historia</label>
            </p>
            <p>
                <input type="radio" id="arte" name="asignatura" value="Arte" <?= $asignatura == 'Arte' ? 'checked' : '' ?>>
                <label for="arte">Arte</label>
            </p>
            <input type="submit" value="Guardar">
        </form>

        <p><?= $mensaje ?></p>
    </div>
</body>

</html>