<?php
$name = "Javier";
$name = "Carlos";
$price = 5;
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
    <h2>Welcome <?php echo $name;?></h2>
    <p>The cost of your candy is
    $<?php echo $price; ?>per pack.
    </p>
</body>
</html>
