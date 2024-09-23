<?php
$factor = 3; // Variable global

function multiplicar($numero, &$resultado)
{
    static $contador = 0; // Variable estática
    global $factor; // Acceso a la variable global

    $contador++;
    $resultado = $numero * $factor;

    return $contador;
}

// Llamadas a la función
$resultado = 0;

$contador = multiplicar(2, $resultado);
echo "Resultado: $resultado, Llamadas a la función: $contador<br>"; // Espera Resultado: 6, Llamadas a la función: 1

$contador = multiplicar(4, $resultado);
echo "Resultado: $resultado, Llamadas a la función: $contador<br>"; // Espera Resultado: 12, Llamadas a la función: 2

$contador = multiplicar(6, $resultado);
echo "Resultado: $resultado, Llamadas a la función: $contador<br>"; // Espera Resultado: 18, Llamadas a la función: 3
