<?php
//Cargar las clases de la librería de composer
//En este caso se cargan las clases de Dotenv
//que se utilizan para cargar las variables de entorno
//desde el archivo .env
//Intalación de las librerías de composer
//composer require vlucas/phpdotenv

require_once __DIR__ . '../../vendor/autoload.php';

use Dotenv\Dotenv;


// Cargar las variables de entorno desde el archivo .env
// Cuando se despliegue en un servidor de producción, no olvides
// configurar las variables de entorno en el servidor
// No subir el archivo .env al repositorio de código
// Para ello se debe agregar al archivo .gitignore la línea .env

$dotenv = Dotenv::createImmutable(__DIR__ . '../../');
$dotenv->load();

//A partir de esta línea se pueden utilizar las variables de entorno definidas en el archivo .env
//Se almacenan en la variable global $_ENV
//var_dump($_ENV);
//exit;

require_once 'autoload.php'; // Cargar todas las clases propias con el autoloader

//Manejo de errores
Base::manejadorErrorGlobal();

Cors::handleCors();

header('Content-Type: application/JSON');


$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET': //mostrar           
        Mostrar::gestion();
        break;
    case 'POST': //insertar 
        Insertar::gestion();
        break;
    case 'PUT': //actualizar
        Actualizar::gestion();
        break;
    case 'DELETE': //borrar
        Borrar::gestion();
        break;
    default:  //METODO NO SOPORTADO   
        // http_response_code(404);    
        header("HTTP/1.0 404 Not Found");
        echo json_encode(["error" => "Ruta no encontrada"]);
        break;
}
