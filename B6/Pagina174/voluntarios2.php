<?php
$eventos = ['Ceremonia de Apertura', 'Atletismo', 'Natación', 'Ciclismo', 'Ceremonia de Clausura', 'Gimnasia', 'Voleibol'];
$seleccionados = [];
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['eventos']) && count($_POST['eventos']) >= 2) {
        $seleccionados = $_POST['eventos'];
        $mensaje = "Has seleccionado los siguientes eventos: " . implode(", ", $seleccionados);
    } else {
        $mensaje = "Por favor, selecciona al menos dos eventos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de Voluntarios - Olimpiadas de París 2024</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Inscripción de Voluntarios para las Olimpiadas de París 2024</h1>
        <form action="voluntarios2.php" method="POST">
            <?php foreach ($eventos as $evento) : ?>
                <p>
                    <input type="checkbox" id="<?= htmlspecialchars($evento) ?>" name="eventos[]" value="<?= htmlspecialchars($evento) ?>" <?= in_array($evento, $seleccionados) ? 'checked' : '' ?>>
                    <label for="<?= htmlspecialchars($evento) ?>"><?= htmlspecialchars($evento) ?></label>
                </p>
            <?php endforeach; ?>
            <input type="submit" value="Guardar">
        </form>
        <p><?= $mensaje ?></p>
    </div>
</body>

</html>