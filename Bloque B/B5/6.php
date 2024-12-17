<?php
class BurgerShop
{
    private $nombre = "BurgerHeaven";
    private $registroVentas = [];
    private $menu = [
        "Hamburguesa Clásica" => 5.50,
        "Hamburguesa con Queso" => 6.75,
        "Hamburguesa BBQ" => 7.25,
        "Hamburguesa Vegetariana" => 6.00,
    ];

    // GETTERS
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getRegistroVentas(): array
    {
        return $this->registroVentas;
    }

    public function getMenu(): array
    {
        return $this->menu;
    }

    // MÉTODOS

    // 1. Generar un número aleatorio de ventas:
    public function generarNumeroVentas(): int
    {
        return mt_rand(50, 100);
    }

    // 2. Asignar hamburguesas y cantidades a cada venta:
    public function asignarHamburguesasYCantidades()
    {
        $numeroVentas = $this->generarNumeroVentas();
        $menu = $this->getMenu();

        for ($i = 0; $i < $numeroVentas; $i++) {
            $hamburguesa = array_rand($menu);
            $cantidad = mt_rand(1, 5);

            $this->registroVentas[] = [
                'hamburguesa' => $hamburguesa,
                'cantidad' => $cantidad,
                'precio' => $menu[$hamburguesa]
            ];
        }
    }

    // 3. Calcular el total de cada venta:
    public function calcularTotalPorVenta(): array
    {
        $ventas = $this->getRegistroVentas();
        $totales = [];

        foreach ($ventas as $venta) {
            $totales[] = round($venta['precio'] * $venta['cantidad'], 2);
        }

        return $totales;
    }

    // 4. Calcular el total diario de ventas:
    public function calcularTotalDiario(): string
    {
        $totalesPorVenta = $this->calcularTotalPorVenta();
        $totalDiario = array_sum($totalesPorVenta);

        return number_format($totalDiario, 2, ',', ' ');
    }

    // 5. Calcular estadísticas de ventas:
    public function calcularEstadisticas(): string
    {
        // Obtener el total diario formateado
        $totalFormateado = $this->calcularTotalDiario();

        // Convertir el total formateado a un valor flotante
        $total = (float)str_replace(',', '.', str_replace(' ', '', $totalFormateado));

        // Calcular la raíz cuadrada del total
        $raizCuadrada = sqrt($total);

        // Elevar el total a la potencia de 2
        $potenciaDos = pow($total, 2);

        // Redondear el total hacia arriba y hacia abajo
        $redondeoArriba = ceil($total);
        $redondeoAbajo = floor($total);

        // Mostrar los resultados
        $mostrarEstadisticas = "
        <ul>
            <li><b>Total del día:</b> $totalFormateado €</li>
            <li><b>Raíz cuadrada del total:</b> $raizCuadrada</li>
            <li><b>Total al cuadrado:</b> $potenciaDos</li>
            <li><b>Redondeo hacia arriba:</b> $redondeoArriba</li>
            <li><b>Redondeo hacia abajo:</b> $redondeoAbajo</li>
        </ul>";

        return $mostrarEstadisticas;
    }
}

// Crear una instancia de BurgerShop
$burgerShop = new BurgerShop();
$burgerShop->asignarHamburguesasYCantidades();
$totalesPorVenta = $burgerShop->calcularTotalPorVenta();
$totalDiario = $burgerShop->calcularTotalDiario();
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<!-- Mostrar el nombre de la hamburguesería -->
<h1><?= $burgerShop->getNombre() ?></h1>

<!-- Mostrar el total del día -->
<h2>Total del día: <?= $totalDiario ?> €</h2>

<!-- Mostrar las ventas individuales -->
<h3>Ventas por tipo de hamburguesa:</h3>
<ul>
    <?php foreach ($burgerShop->getRegistroVentas() as $venta): ?>
        <li>
            <b><?= $venta['hamburguesa'] ?>:</b> <?= $venta['cantidad'] ?> unidades vendidas | Total: <?= round($venta['precio'] * $venta['cantidad'], 2) ?> €
        </li>
    <?php endforeach; ?>
</ul>

<!-- Mostrar estadísticas -->
<h3>Estadísticas:</h3>
<?= $burgerShop->calcularEstadisticas() ?>

<?php include './includes/footer.php'; ?>