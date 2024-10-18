<?php
// Asignar un nombre a la sesión
session_name('mi_sesion_personalizada2');

// Configurar los parámetros de la cookie de sesión
$options = [
    'cookie_lifetime' => 3600,          // La cookie durará 1 hora.
    'cookie_path' => '/xclase/asd/sesiones/admin/', // Válida en la ruta /admin.
    'cookie_domain' => 'localhost', // Válida en todo el subdominio.
    'cookie_secure' => false,     // SE envía por HTTP.
    'cookie_httponly' => true,   // No accesible vía JavaScript.
    'use_strict_mode' => true,   // Modo estricto activado. NO aceptará cookies de sesiones con ID enviadas por GET o POST. Solo por cookies.    
];

// Iniciar la sesión con las opciones configuradas
session_start($options);

echo '</pre>';
echo '<br>El contenido de $_COOKIE es: ';
var_dump($_COOKIE);
echo "<br>El nombre de la sesión es: ";
var_dump($_SESSION);
echo '</pre>';
