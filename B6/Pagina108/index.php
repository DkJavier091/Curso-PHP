<?php include '../Importes/header.php'; ?>

<form action="index.php" method="GET">
    <p>Nombre: <input type="text" name="nombre"></p>
    <p>Edad: <input type="text" name="edad"></p>
    <p>Correo Electrónico: <input type="text" name="correo_electronico"></p>
    <p>Contraseña: <input type="password" name="pwd"></p>
    <p>Biografía: <textarea name="bio"></textarea></p>
    <p>Preferencias de contacto:
        <select name="preferencias">
            <option value="correo_electronico">Correo Electrónico</option>
            <option value="telefono">Teléfono</option>
        </select>
    </p>
    <p>Calificación:
        1 <input type="radio" name="rating" value="1">
        2 <input type="radio" name="rating" value="2">
        3 <input type="radio" name="rating" value="3"></p>
    <p><input type="checkbox" name="terms" value="true">
        Acepto los términos y condiciones.</p>
    <p><input type="submit" value="Guardar"></p>
</form>

<?php if (!empty($_GET)) : ?>
    <h2>Información del Formulario:</h2>
    <ul>
        <li><strong>Nombre:</strong> <?= htmlspecialchars($_GET['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?></li>
        <li><strong>Edad:</strong> <?= htmlspecialchars($_GET['edad'] ?? '', ENT_QUOTES, 'UTF-8') ?></li>
        <li><strong>Correo Electrónico:</strong> <?= htmlspecialchars($_GET['correo_electronico'] ?? '', ENT_QUOTES, 'UTF-8') ?></li>
        <li><strong>Contraseña:</strong> <?= htmlspecialchars($_GET['pwd'] ?? '', ENT_QUOTES, 'UTF-8') ?></li>
        <li><strong>Biografía:</strong> <?= htmlspecialchars($_GET['bio'] ?? '', ENT_QUOTES, 'UTF-8') ?></li>
        <li><strong>Preferencias de contacto:</strong> <?= htmlspecialchars($_GET['preferencias'] ?? '', ENT_QUOTES, 'UTF-8') ?></li>
    </ul>
<?php endif; ?>

<?php include '../Importes/footer.php'; ?>