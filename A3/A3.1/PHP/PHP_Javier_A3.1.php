<?php
function write_logo(){
    echo "<img src='../../Recursos%20A3/img/logo.png' alt='Logo'>";
}

function write_copyright_notice(){
    $year = date("Y");
    echo "&copy; " . "The Candy Store" . $year;
}
?>

