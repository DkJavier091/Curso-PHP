<?php
$name = 'Javier';
$favorites = ['Toffee', 'Chocolate', 'Fudge' ];
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Css/styles.css">
    <title>Document</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Welcome <?= $name ?></h2>
    <p>Your favorite type of candy is:
        <?= $favorites [0] ?>.
    </p>
</body>
</html>