<?php
class Customer{
    // Propiedades
    public string $forename;
    public string $surname;
    public string $email;
    public string $password;
}

class Account{
    // Propiedades
    public int $number;
    public string $type;
    public float $balance;

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

// Instanciación clase customer
$customer = new Customer();

// Instanciación de valores a los parametros internos
$customer->email = 'ivy@eg.link';
$customer->forename = 'Javier';
$customer->surname = 'Agundo';

// Instanciación clase account
$account = new Account();

// Instanciación de valores a los parametros internos
$account->balance = 100.00;

?>

<?php include 'includes/header.php'; ?>

<p>Name: <?= $customer->forename ?></p>
<p>Apellidos: <?= $customer->surname ?></p>
<p>Email: <?= $customer->email ?></p>
<p>Balance: $<?= $account->balance ?></p>
<p>Updated Balance: $<?= $account->deposit(50.00); ?></p>

<?php include 'includes/footer.php'; ?>
