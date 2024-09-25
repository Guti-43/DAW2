<?php
function manipularNumeros($numero1, &$numero2, $incremento = 5)
{
    $numero1 += $incremento;
    $numero2 *= 2;
    echo "Valor de num1 dentro de la función: $numero1<br>";
}

$num1 = 10;
$num2 = 15;

// Llamada a la función con dos parámetros
manipularNumeros($num1, $num2);

echo "Valor de num1 después de la función: $num1<br>"; // Espera 10 (sin cambio, ya que es paso por valor)
echo "Valor de num2 después de la función: $num2<br>"; // Espera 30 (duplicado fuera de la función, ya que es paso por referencia)

// Llamada a la función con tres parámetros
manipularNumeros($num1, $num2, 3);

echo "Valor de num1 después de la función: $num1<br>"; // Espera 10 (sin cambio, ya que es paso por valor)
echo "Valor de num2 después de la función: $num2<br>"; // Espera 30 (duplicado fuera de la función, ya que es paso por referencia)
