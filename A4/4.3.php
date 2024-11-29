<?php
declare(strict_types = 1);


class Account{
    // Propiedades
    public int $number;
    public string $type;
    public float $balance;

    // CONSTRUCTOR
    public function __construct(int $number, string $type, float $balance = 0.00)
    {
        $this->number  = $number;
        $this->type    = $type;
        $this->balance = $balance;
    }

    /**
     * Función deposit, se le pasa un número en float.
     * Instancia este parametro dentro del paramatro interno balance +=,
     * devuelve el valor del parametro interno balance.
     * @param float $amount
     * @return float
     */
    public function deposit(float $amount): float{
        $this->balance += $amount;

        return $this->balance;
    }

    /**
     * Función withdraw, se le pasa un número en float. Instancia este parametro en resta del
     * parametro interno balance -=, devuelve el valor del parametro interno balance.
     * @param float $amount
     * @return float
     */
    public function withdraw(float $amount): float{
        $this->balance -= $amount;

        return $this->balance;
    }
}

/// Instanciación de la clase Account con inserción de argumentos.
$checking = new Account(43161176, 'Checking', 32.00);
$savings = new Account(20148896, 'Savings', 756.00);


// Agregado la clase productos.
include 'Clases/Product.php';

//Instancicación de la clase productos con inserción de argumentos.
$churros = new Product(1, "Churros", 0.60, 100);
$tostada = new Product(2, "Tostada", 1.50, 50);
/*Abierto todos los días de semana de 7am a 21pm, fines de semana y festivos cerrado a partir de las 12pm*/

//Actualización de stock de las instanciaciones en los argumentos
$churros->stock = 150;
$tostada->price = 2.00;

?>

<?php include 'includes/header.php'; ?>

<h2>Account Balances</h2>
<table>
    <tr>
        <th>Date</th>
        <th><?= $checking->type ?></th>
        <th><?= $savings->type  ?></th>
    </tr>
    <tr>
        <td>23 June</td>
        <td>$<?= $checking->balance ?></td>
        <td>$<?= $savings->balance  ?></td>
    </tr>
    <tr>
        <td>24 June</td>
        <td>$<?= $checking->deposit(12.00)  ?></td>
        <td>$<?= $savings->withdraw(100.00) ?></td>
    </tr>
    <tr>
        <td>25 June</td>
        <td>$<?= $checking->withdraw(5.00) ?></td>
        <td>$<?= $savings->deposit(300.00) ?></td>
    </tr>
</table>

<br><br>

<h2>Product List</h2>
<table>
    <tr>
        <th>Name</th>
        <th>ID</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>

    <tr>
        <th><?= $churros->name ?></th>
        <th><?= $churros->id ?></th>
        <th><?= $churros->price ?></th>
        <th><?= $churros->stock ?></th>
    </tr>

    <tr>
        <th><?= $tostada->name ?></th>
        <th><?= $tostada->id ?></th>
        <th><?= $tostada->price ?></th>
        <th><?= $tostada->stock ?></th>
    </tr>
</table>

<?php include 'includes/footer.php'; ?>