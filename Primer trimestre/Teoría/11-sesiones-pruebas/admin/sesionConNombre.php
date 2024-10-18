<?php
// Iniciar una sesión con nombre
session_name('mi_sesion_personalizada');
session_start();
echo '<br>El contenido de $_COOKIE es: ';
var_dump($_COOKIE);
echo "<br>El nombre de la sesión es: ";
var_dump(session_name());

$_SESSION['nombre'] = 'Juan';
echo "<br>El contenido de la sesión es: ";
var_dump($_SESSION);
