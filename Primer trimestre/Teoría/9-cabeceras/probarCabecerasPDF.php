<?php
$ruta = 'misEjemplos';

// Nombre de los archivos
$pdArchivo = 'archivo.pdf';


// Ruta completa a los archivos
$rutaCompletaPdf = $ruta . '/' . $pdArchivo;


//La función readfile() en PHP se utiliza para leer un archivo y escribir su contenido directamente en la salida estándar ( el navegador, en aplicaciones web).

//Otras funciones de lectura de archivos como file_get_contents() o fread(), readfile() almacena el contenido del fichero en una variable. 

if (file_exists($rutaCompletaPdf)) {
    header('Content-Type: ' . mime_content_type($rutaCompletaPdf));
    header('Content-Disposition: inline; filename="' . pathinfo($rutaCompletaPdf, PATHINFO_BASENAME) . '"');
    header('Content-Length: ' . filesize($rutaCompletaPdf));
    readfile($rutaCompletaPdf);
    exit;
} else {
    echo "El archivo no existe.";
}
