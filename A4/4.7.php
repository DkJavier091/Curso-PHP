<?php
// Incluimos las clases
include 'Clases/Library_Version2.php';
include 'Classes/Book.php';

// Array de libros para la clase Library_Version2
$libros = [
    new Book('Como hacer una buena tortilla española', 'Julio Torres', 35),
    new Book('Como criar a mi futuro marido', 'Teodoro Lopez', 728),
    new Book('La princesa de ojos violetas', 'Lucia García', 581)
];

// Instanciación de la clase Cuenta + sus propiedades
$Libreria = new Library_Version2($libros, 'El rincon del lector');

?>

<?php include 'includes/header.php'; ?>

    <!-- Mostramos el nombre de la librería -->
    <h2><?= $Libreria->libraryName ?> : Librería</h2>
    <ul>
        <!-- Recorremos el array de libros -->
        <?php foreach($Libreria->getLibros() as $libro): ?>
            <li>
                <?= $libro->getTitle() ?> por 
                <?= $libro->getAuthor() ?> 
                (<?= $libro->getPages() ?> páginas)
            </li>
        <?php endforeach; ?>
    </ul>

<?php include 'includes/footer.php';?>