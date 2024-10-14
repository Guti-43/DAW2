<?php
// Enviar suficiente contenido para llenar el buffer
for ($i = 0; $i < 1000; $i++) {
    echo "Llenando el buffer de salida... "; // Enviar texto repetido
}
$test = NULL;
if ($test) {
    echo "Estás dentro!";
} else {
    header('Location: https://www.iesvenancioblanco.es/');
}
