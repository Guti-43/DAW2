<?php
spl_autoload_register(function ($clase) {
    $paths = [
        __DIR__ . '/bd/' . $clase . '.php',
        __DIR__ . '/modelo/' . $clase . '.php',
        __DIR__ . '/controlador/' . $clase . '.php',
        __DIR__ . '/../config/' . $clase . '.php'
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            break;
        }
    }
});
