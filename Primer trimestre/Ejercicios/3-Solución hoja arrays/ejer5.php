<?php
// Función para calcular la letra del NIF
function calcularLetraNIF($dni)
{
    // Array con las letras correspondientes a cada resto
    $letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];

    // Calculamos el resto de dividir el DNI por 23
    $resto = $dni % 23;

    // Obtenemos la letra correspondiente usando el resto como índice del array
    $letra = $letras[$resto];

    return $letra;
}

// Ejemplo 
$dni = 12345678;
echo "El NIF para el DNI $dni es:<br>", $dni . calcularLetraNIF($dni);
