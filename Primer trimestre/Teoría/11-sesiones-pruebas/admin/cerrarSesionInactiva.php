<?php
// Configurar las opciones de la sesión
$options = [
    'cookie_lifetime' => 3600,          // La cookie durará 1 hora.
    'cookie_path' => '/xclase/asd/sesiones/admin/', // Válida en la ruta /admin.
    'cookie_domain' => 'localhost', // Válida en todo el subdominio.
    'cookie_secure' => false,     // SE envía por HTTP.
    'cookie_httponly' => true,   // No accesible vía JavaScript.
    'use_strict_mode' => true,   // Modo estricto activado.
];

// Asignar el nombre de la sesión
session_name('mi_sesion_personalizada');

// Iniciar la sesión con las opciones configuradas
session_start($options);

// Verificar si la sesión ha expirado por inactividad
$inactiviada_limite = 600; // 10 minutos de inactividad


// Convertir el tiempo de la última actividad en horas, minutos y segundos
if (isset($_SESSION['ultima_actividad'])) {
    $ultima_actividad = $_SESSION['ultima_actividad'];
    $tiempo_actual = time();
    $tiempo_transcurrido = $tiempo_actual - $ultima_actividad;

    $horas = floor($tiempo_transcurrido / 3600);
    $minutos = floor(($tiempo_transcurrido % 3600) / 60);
    $segundos = $tiempo_transcurrido % 60;

    echo "<hr><h2>Tiempo transcurrido desde la última actividad:</h2> {$horas} horas, {$minutos} minutos, {$segundos} segundos.<br>";
}
if (isset($_SESSION['ultima_actividad']) && (time() - $_SESSION['ultima_actividad']) > $inactiviada_limite) {
    // La sesión ha expirado por inactividad
    setcookie(session_name(), '', time() - 3600); // Eliminar la cookie de sesión

    $_SESSION = [];    // Eliminar todas las variables de sesión

    session_destroy();   // Destruir la sesión

    echo "La sesión ha expirado por inactividad.";
    exit; // Terminar el script aquí si la sesión ha expirado
} else {
    // Actualizar el tiempo de la última actividad
    $_SESSION['ultima_actividad'] = time();
    echo "<h2>La sesión está activa.</h2>";
}

// Guardar un valor en la sesión
$_SESSION['nombre'] = 'Juan';

// Mostrar las cookies y el nombre de la sesión
echo '<hr><br>El contenido de $_COOKIE es: ';
var_dump($_COOKIE);
echo "<hr><br>El nombre de la sesión es: ";
var_dump(session_name());
echo "<hr><br>El contenido de la sesión es: ";
var_dump($_SESSION);
