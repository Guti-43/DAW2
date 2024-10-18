<?php
//Las sesiones que tienen nombres diferentes, son sesiones diferentes.
//NO utilizan la misma cookie de sesión.
//Y por lo tanto, no comparten la información de sesión.
//Usan diferentes arrays $_SESSION.

// Iniciar una sesión sin nombre, establece los valores por defecto.
// La sesión se llamará PHPSESSID
// La cookie de sesión se llamará PHPSESSID
// La cookie de sesión será válida en toda la aplicación.
// La cookie de sesión será accesible vía HTTP y JavaScript.
// La cookie de sesión durará 0 segundos, se eliminará al cerrar el navegador.

session_start();
echo '<br>El contenido de $_COOKIE es: ';
var_dump($_COOKIE);
echo "<br>El nombre de la sesión es: ";
var_dump(session_name());
echo "<br>El contenido de la sesión es: ";
var_dump($_SESSION);
