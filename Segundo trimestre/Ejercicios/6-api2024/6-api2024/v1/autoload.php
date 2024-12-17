<?php
spl_autoload_register(function ($clase) {
    $paths = [
        'bd/' . $clase . '.php',
        'modelo/' . $clase . '.php',
        'controlador/' . $clase . '.php',
        'cors/' . $clase . '.php'
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            break;
        }
    }
});
