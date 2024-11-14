<?php
function create_logo(){
    return '<img src="../../Recursos%20A3/img/logo.png" alt="logo" />';
}

function create_copyright_notice(){
    $year = date("Y");
    $message = '&copy;'. "The Candy Store" . $year;
    return $message;
}
?>