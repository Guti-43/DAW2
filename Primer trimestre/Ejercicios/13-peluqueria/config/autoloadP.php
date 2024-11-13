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
