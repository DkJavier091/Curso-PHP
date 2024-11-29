<?php
declare(strict_types = 1);


class Account{
    /*Propiedades Expeciales*/
    protected float $balance;  // Actualización: Solo accecible dentro de clase
    protected string $owner; //Propiedad solicitada x el ejercicio

    public int $number;
    public string $type;

    //Constructores -> Parametro Owner en String vacio para evitar errores de instancia.
    public function __construct(int $number, string $type, float $balance = 0.00, string $owner = "")
    {
        $this->number  = $number;
        $this->type    = $type;
        $this->balance = $balance;
        $this->owner = $owner;
    }

    /*Getter*/
    /*Devuelve el dato de valance*/
    public function getBalance(): float{
        return $this->balance;
    }

    /*Devuelve el dato del nombre del dueño*/
    public function getOwner(): string{
        return $this->owner;
    }

    /*Setters*/
    /*Insercción del nombre al parametro interno de dueño por medio de parametros externos*/
    public function setOwner($nameOwner){
        $this->owner = $nameOwner;
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
//Instanciación de la clase account con insercción de argumentos.
$account = new Account(20148896, 'Savings', 80.00);
$cuentaSecundaria = new Account(98765432, 'Savings', 500);

//Uso de metodo Set para instanciar el nombre del dueño !Mucho más versatil y seguro!
$cuentaSecundaria->setOwner('Javier');
?>

<?php include 'includes/header.php'; ?>

<h2><?= $account->type ?> Account</h2>
<p>Previous balance: $<?= $account->getBalance() ?></p>
<p>New Balance: $<?= $account->deposit(35.00) ?></p>

<h2><?= $cuentaSecundaria->type ?> Account</h2>
<p>Owner: <?= $cuentaSecundaria->getOwner() ?></p>
<p>Previous balance: $<?= $cuentaSecundaria->getBalance() ?></p>
<p>New Balance: $<?= $cuentaSecundaria->deposit(350.00) ?></p>

<?php include 'includes/footer.php'; ?>
