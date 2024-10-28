<?php
// Información necersaria para la conexión a la base de datos
const HOST = 'localhost';
const DATABASE = 'probando';
const USERNAME = 'root';
const PASSWORD = '';
const PORT = '3306'; //puerto en el que escucha MariaDB por defecto
const CHARSET = 'UTF8';

$logFile = "miFicheroErrores.log";

// Eliminar el archivo de log si existe, para que no se acumulen los errores
if (file_exists($logFile)) {
    unlink($logFile);
}

//$conexion = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';port=' . PORT . ';charset=' . CHARSET, USERNAME, PASSWORD);
try {
    $dns = "mysql:host=" . HOST . ";dbname=" . DATABASE . ";port=" . PORT . ";charset=" . CHARSET;

    //$conexion contiene el objeto PDO que representa la conexión a la base de datos
    $conexion = new PDO($dns, USERNAME, PASSWORD);

    // Establecer el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta de prueba
    $sql = "SELECT * FROM usuarios";

    // Ejecutar la consulta. $resultado contiene el objeto PDOStatement con los resultados
    $resultado = $conexion->query($sql);

    // Obtener los resultados
    $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

    var_dump($usuarios);
} catch (PDOException $e) {
    echo "<pre><br>Error: " . $e->getMessage() . "<br>";
    echo "<br>Código de error: " . $e->getCode() . "<br>";
    echo "<br>Archivo: " . $e->getFile() . "<br>";
    echo "<br>Línea: " . $e->getLine() . "<br><br>";
    echo $cadena = print_r($e->getTrace(), true); //Array errores, convertido a string para visualizarlo
    echo "<br>Rastro: " . $e->getTraceAsString() . "</pre>";
    // Rastro: Una lista de todas las llamadas que se hicieron para llegar a la excepción.
    // Archivo: El nombre del archivo donde ocurrió cada llamada.
    // Línea: El número de línea en el archivo donde ocurrió cada llamada.
    // Función: El nombre de la función o método que fue llamado.
    // Argumentos: Los argumentos que fueron pasados a la función o método

    // Registrar los errores en el archivo de log, creamos un string
    //Devuelve un array que contiene el rastro de la pila de llamadas en el momento en que se lanzó la excepción.
    $cadena = print_r($e->getTrace(), true);
    $detallesError = "Error: " . $e->getMessage() . "\n" .
        "\nCódigo de error: " . $e->getCode() . "\n" .
        "\nArchivo: " . $e->getFile() . "\n" .
        "\nLínea: " . $e->getLine() . "\n" .
        "\nRastro:\n " . $cadena . "\n";

    // funcion error_log() escribe un mensaje de error en el log del servidor
    // 3 indica que el mensaje de error se escribirá en un archivo
    error_log($detallesError, 3, "miFicheroErrores.log");
    exit;
} finally {
    //$resultado es un objeto PDOStatement que contiene los resultados de la consulta
    //$conexion es un objeto PDO que representa la conexión a la base de datos

    // Cerrar el cursor, liberar recursos y evitar bloqueos
    $resultado->closeCursor();
    // Cerrar la conexión
    $conexion = null;
}
