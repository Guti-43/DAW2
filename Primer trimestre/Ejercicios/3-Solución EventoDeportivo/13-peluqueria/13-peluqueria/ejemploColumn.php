<?php
// Conexión a la base de datos usando PDO
$dsn = 'mysql:host=localhost;dbname=peluqueria';
$username = 'root';
$password = '';
$options = [];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

// Preparar la consulta
$sql = 'SELECT email FROM usuarios';
$stmt = $pdo->prepare($sql);

// Ejecutar la consulta
$stmt->execute();

// Obtener todos los correos electrónicos
// Solo quiero la primera columna de los resultados
$emails = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

foreach ($emails as $email) {
    echo $email . '<br>';
}
echo '<pre>';
print_r($emails);
echo '</pre>';
