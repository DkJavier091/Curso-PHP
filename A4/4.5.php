<?php
include './Clases/Account.php';

/*Resguardamos datos dentro de un array con identificadores.*/
$numbers = [
    'account_number' => 12345678,
    'routing_number' => 987654321,
];


$account = new Account($numbers, 'Savings', 10.00);
$account->setOwner('Francisco');
$account->surname = 'España';

?>

<?php include 'includes/header.php'; ?>

<h2><?= $account->type ?> account</h2>
<p> Owner: <?= $account->getOwner()?></p>
<p> Apellido: <?= $account->surname?></p>
<p> Account: <?= $account->numbers['account_number'] ?></p>
<p> Routing: <?= $account->numbers['routing_number'] ?></p>

<?php include 'includes/footer.php'; ?>
