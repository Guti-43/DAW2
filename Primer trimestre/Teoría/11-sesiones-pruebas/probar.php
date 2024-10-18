<?php
// Cookie que durará 2 horas, será válida solo en /admin y no será accesible desde JavaScript.

// Asignar un nombre a la sesión
session_name('mi_sesion_ruta_admin');
session_set_cookie_params([
    'lifetime' => 7200,
    'path' => '/xclase/asd/sesiones/admin/', //Ruta donde será válida, debe ser absoluto y comenzar con /.
    'domain' => 'localhost',
    'secure' => false,     //Solo se enviará por HTTPS si es true.
    'httponly' => true     //No accesible desde JavaScript.
]);
// Iniciar la sesión
session_start();


var_dump($_COOKIE);
var_dump($_SESSION);
