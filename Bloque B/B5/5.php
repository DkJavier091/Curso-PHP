<?php
// Datos de entrada, incluyendo correos electrónicos, números de teléfono y URLs
$data = [
    "ana.smith@example.com",
    "bob-jones@webpage.net",
    "correo-invalido@com",
    "555-123-4567",
    "444.321.9876",
    "http://www.ejemplo.com",
    "https://sitio.org/ruta?consulta=cadena",
    "no-es-una-url"
];

// Expresión regular para validar correos electrónicos
$emailRegex = '/^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,6}$/i';
$validEmails = [];

// Validamos cada elemento del array $data
foreach ($data as $item) {
    if (preg_match($emailRegex, $item)) {
        $validEmails[] = $item;
    }
}

// Expresión regular para extraer números de teléfono
$phoneRegex = '/\b\d{3}[-.]\d{3}[-.]\d{4}\b/';
$validPhones = [];

// Extraemos todos los números válidos del array $data
foreach ($data as $item) {
    if (preg_match_all($phoneRegex, $item, $matches)) {
        foreach ($matches[0] as $phone) {
            $validPhones[] = $phone;
        }
    }
}

// Expresión regular para dividir una URL en sus componentes
$urlRegex = '/[/:?]/';
$validUrls = [];

// Dividimos cada URL en protocolo, dominio y ruta
foreach ($data as $item) {
    $components = preg_split($urlRegex, $item, -1, PREG_SPLIT_NO_EMPTY);
    if (count($components) >= 3 && ($components[0] === 'http' || $components[0] === 'https')) {
        $path = '';
        if (count($components) > 2) {
            for ($i = 2; $i < count($components); $i++) {
                $path .= ($i > 2 ? '/' : '') . $components[$i];
            }
        }
        $validUrls[] = [
            'protocol' => $components[0],
            'domain' => $components[1],
            'path' => $path
        ];
    }
}

// Expresión regular para reemplazar correos inválidos
$cleanedData = [];

// Reemplazamos direcciones de correo electrónico inválidas con una cadena vacía
foreach ($data as $item) {
    $cleanedData[] = preg_replace($emailRegex, '', $item);
}
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h2>Direcciones de Correo Electrónico Válidas</h2>
<ul>
    <?php foreach ($validEmails as $email) : ?>
        <li><?= $email ?></li>
    <?php endforeach; ?>
</ul>

<h2>Números de Teléfono Válidos</h2>
<ul>
    <?php foreach ($validPhones as $phone) : ?>
        <li><?= $phone ?></li>
    <?php endforeach; ?>
</ul>

<h2>URLs Válidas</h2>
<ul>
    <?php foreach ($validUrls as $url) : ?>
        <li>
            <ul>
                <li>Protocolo: <?= $url['protocol'] ?></li>
                <li>Dominio: <?= $url['domain'] ?></li>
                <li>Ruta: <?= $url['path'] ?></li>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Datos Limpios</h2>
<ul>
    <?php foreach ($cleanedData as $item) : ?>
        <?php if ($item) : ?>
            <li><?= $item ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<?php include './includes/footer.php'; ?>