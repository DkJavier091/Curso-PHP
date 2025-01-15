<?php
function es_numerico($numero, $min = 0, $max = 100): bool
{
    return ($numero >= $min and $numero <= $max);
}

function es_texto($texto, $min = 0, $max = 1000)
{
    $longitud = mb_strlen($texto);
    return ($longitud >= $min and $longitud <= $max);
}

function es_clave($clave): bool
{
    if (
        mb_strlen($clave) >= 8
        and preg_match('/[A-Z]/', $clave)
        and preg_match('/[a-z]/', $clave)
        and preg_match('/[0-9]/', $clave)
    ) {
        return true;  // Passed all tests
    }
    return false;   // Invalid
}
