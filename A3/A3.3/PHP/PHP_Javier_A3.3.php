<?php
function calculate_total($price, $quantity){
    $cost = $price * $quantity;
    $tax = $cost * (20/100); //Cálculo del 20% del total para impuestos.
    $total = $cost + $tax;
    return $total;
}
?>