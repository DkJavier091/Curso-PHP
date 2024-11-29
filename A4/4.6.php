<?php
include './Clases/Library.php';

//Array con los titulares de libros
$Libros = [
    'Solo Leveling',
    'En el momento en el que caimos del cielo',
    'Una chica demasiado honesta apesar de su dialecto de kyoto',
    'La vida despues de la muerte',
];

// Instanciamos la clase Library en Biblioteca
$biblioteca = new Library($Libros, 'El rinco del libro');

// Añadimmos un nuevo elemento a la instancia
$biblioteca->setter_addBook('La torre de Dios');

// Eliminamos un elemento anteriormente añadido en la instancia
$biblioteca->EliminarLibros('En el momento en el que caimos del cielo');

// Listamos los libros que disponemos aun en el Array
$Listado_Libros = $biblioteca->getLibros();
?>

<?php include 'includes/header.php'; ?>

<!--Mostramos el nombre-->
<h2><?= $biblioteca->libraryName ?> Librería</h2>

<!--Generamos un recorrido para en un listado para mostrar el contenido de nuestro Array-->
<ul>
    <?php foreach($Listado_Libros as $libro): ?>
        <li><?= $libro ?></li>
    <?php endforeach; ?>
</ul>

<?php include 'includes/footer.php'; ?>