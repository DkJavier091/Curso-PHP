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

}

/*
 * Instanciación de Customer
 * Instanciación de Account
*/
$customer = new Customer();
$account = new Account();

/*Instanciación de valores a propiedades*/
$customer->email = 'ivy@eg.link';
$customer->forename = 'Javier';
$customer->surname = 'Agundo';

$account->balance = 1000.00;

?>

<?php include 'includes/header.php'; ?>
<!--Llamada a propiedades-->
  <p>Name: <?= $customer->forename?></p>
  <p>Apellidos: <?= $customer->surname ?></p>
  <p>Email: <?= $customer->email ?></p>
  <p>Balance: $<?= $account->balance ?></p>

<?php include 'includes/footer.php'; ?>
