<?php
// Información necesaria para la conexión a la base de datos
const HOST = 'localhost';
const DATABASE = 'probando';
const USERNAME = 'root';
const PASSWORD = '';
const PORT = '3306'; // puerto en el que escucha MariaDB por defecto
const CHARSET = 'UTF8';

// Establecer el archivo de log
$logFile = "miFicheroErrores.log";
if (file_exists($logFile)) {
    unlink($logFile);
}

try {
    $dns = "mysql:host=" . HOST . ";dbname=" . DATABASE . ";port=" . PORT . ";charset=" . CHARSET;
    $conexion = new PDO($dns, USERNAME, PASSWORD);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ejemplo con bindParam para la tabla usuarios
    $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
    $stmt = $conexion->prepare($sql);
    $nombre = "Pedro";
    $email = "pedro@example.com";
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 50); // Asignar un string con longitud máxima de 50
    $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50); // Asignar un string con longitud máxima de 50
    $stmt->execute();

    // Cambiar los valores de las variables
    $nombre = "carolina";
    $email = "carolina@example.com";
    $stmt->execute(); // Ejecutar de nuevo con los nuevos valores

    // Ejemplo con bindValue para la tabla productos
    $sql = "INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)";
    $stmt = $conexion->prepare($sql);
    $nombre = "Producto J";
    $precio = 25.50;
    $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR); // Asignar un string
    $stmt->bindValue(':precio', $precio, PDO::PARAM_STR); // Asignar un decimal
    $stmt->execute();

    // Cambiar los valores de las variables (no afecta a la sentencia preparada)
    $nombre = "Producto Z";
    $precio = 35.75;
    $stmt->execute(); // Ejecutar de nuevo pero será con los valores originales

    echo "Datos insertados correctamente.";
} catch (PDOException $e) {
    $cadena = print_r($e->getTrace(), true);
    $detallesError = "Error: " . $e->getMessage() . "\n" .
        "\nCódigo de error: " . $e->getCode() . "\n" .
        "\nArchivo: " . $e->getFile() . "\n" .
        "\nLínea: " . $e->getLine() . "\n" .
        "\nRastro:\n " . $cadena . "\n";
    error_log($detallesError, 3, "miFicheroErrores.log");

    exit("Se ha producido un error. Consulte el archivo de log para más información.");
} finally {
    $stmt ? $stmt->closeCursor() : null;
    $conexion = null;
}
