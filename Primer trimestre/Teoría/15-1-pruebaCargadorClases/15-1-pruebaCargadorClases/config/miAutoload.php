<?php
spl_autoload_register(function ($clase) {
    // Array de directorios donde buscar las clases
    $directorios = [
        __DIR__ . '/../app/model/',
        __DIR__ . '/../app/controller/',
        __DIR__ . '/'
        // Agrega más directorios según sea necesario
    ];

    // Recorre cada directorio y busca el archivo de la clase
    foreach ($directorios as $directorio) {
        $archivo = $directorio . $clase . '.php';
        if (file_exists($archivo)) {
            require_once $archivo;
            return;   //Terminación rápida, si encuentra la clase, termina el bucle
        }
    }
});


// usar la constante magic __DIR__ para obtener la ruta absoluta del directorio actual
// implicará que la constante __DIR__ se refiere al directorio donde se encuentra el archivo miAutoload.php
// y no al directorio donde se encuentra el archivo que lo incluye
// Si realizo la inclusión de miAutoload.php desde otro archivo, la constante __DIR__ se referirá al directorio donde se encuentra miAutoload.php y no creará problemas con la ruta relativa


