<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaturas Optativas</title>
    <link rel="stylesheet" href="styles2.css">
</head>

<body>
    <div class="container">
        <?php
        $asignatura = '';
        $mensaje = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['asignatura']) && !empty($_POST['asignatura'])) {
                $asignatura = htmlspecialchars($_POST['asignatura']);
                $mensaje = "Has seleccionado: $asignatura";
            } else {
                $mensaje = "Por favor, selecciona una asignatura.";
            }
        }
        ?>

        <h1>Selecciona una Asignatura Optativa</h1>
        <form action="optativas2.php" method="POST">
            <label for="asignatura">Asignatura:</label>
            <select id="asignatura" name="asignatura" required>
                <option value="">Selecciona una asignatura</option>
                <option value="Matemáticas" <?= $asignatura == 'Matemáticas' ? 'selected' : '' ?>>Matemáticas</option>
                <option value="Física" <?= $asignatura == 'Física' ? 'selected' : '' ?>>Física</option>
                <option value="Historia" <?= $asignatura == 'Historia' ? 'selected' : '' ?>>Historia</option>
                <option value="Arte" <?= $asignatura == 'Arte' ? 'selected' : '' ?>>Arte</option>
            </select>
            <input type="submit" value="Guardar">
        </form>

        <p><?= $mensaje ?></p>
    </div>
</body>

</html>