<?php
// Leer el archivo JSON
$archivo = 'datos.json';
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);

    // Convertir JSON a array asociativo
    $arrayDesdeJson = json_decode($contenido, true);
    echo "<pre>";
    echo "Convertido a array asociativo:\n";
    var_dump($arrayDesdeJson);
    //print_r($arrayDesdeJson);

    // Convertir JSON a objeto PHP
    $objetoDesdeJson = json_decode($contenido);
    echo "<br>Convertido a objeto PHP:<br>";
    var_dump($objetoDesdeJson);
    //print_r($objetoDesdeJson);
} else {
    echo "El archivo $archivo no existe.";
}
