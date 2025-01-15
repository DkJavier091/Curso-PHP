<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recolección de IPs</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        $ip = '';
        $mensaje = '';

        // Función para validar dirección IPv4 y evitar rangos reservados
        function filtrar_ip($ip)
        {
            $reserved_ranges = [
                '10.0.0.0/8',
                '172.16.0.0/12',
                '192.168.0.0/16',
                '127.0.0.0/8'
            ];

            // Validar que es una dirección IPv4
            if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                return false;
            }

            // Evitar rangos reservados
            foreach ($reserved_ranges as $range) {
                if (ip_in_range($ip, $range)) {
                    return false;
                }
            }

            return true;
        }

        // Función para comprobar si una IP está en un rango específico
        function ip_in_range($ip, $range)
        {
            list($subnet, $bits) = explode('/', $range);
            $ip = ip2long($ip);
            $subnet = ip2long($subnet);
            $mask = -1 << (32 - $bits);
            $subnet &= $mask; // Aplicar la máscara de subred a la subred

            return ($ip & $mask) == $subnet;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ip = $_POST['ip'];

            if (filtrar_ip($ip)) {
                $mensaje = "La dirección IP $ip es válida.";
            } else {
                $ip = "0.0.0.0";
                $mensaje = "La dirección IP ingresada no es válida. Se ha establecido por defecto a $ip.";
            }
        }
        ?>

        <h1>Recolección de IPs</h1>
        <form action="recolectar_ip.php" method="POST">
            <label for="ip">Dirección IP o Rango de IPs:</label>
            <input type="text" id="ip" name="ip" required value="<?= htmlspecialchars($ip) ?>">
            <input type="submit" value="Verificar">
        </form>

        <p><?= $mensaje ?></p>
    </div>
</body>

</html>