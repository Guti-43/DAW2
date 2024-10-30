<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba BD</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    require_once 'BaseDatos2.php';

    // Obtener la instancia de la base de datos
    $db = BaseDatos2::obtenerInstancia();



    // Ejemplo de consulta INSERT
    $sqlInsert = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
    $paramsInsert = [
        ':nombre' => ['valor' => 'Pepito', 'tipo' => PDO::PARAM_STR, 'longitud' => 50],
        ':email' => ['valor' => 'pepito@example.com', 'tipo' => PDO::PARAM_STR, 'longitud' => 50]
    ];
    // $paramsInsert = [
    //     ':nombre' => ['valor' => 'Pepito'],
    //     ':email' => ['valor' => 'pepito@example.com']
    // ];
    $lastInsertId = $db->insertar($sqlInsert, $paramsInsert);
    echo "<p>Respuesta del insert<br> Usuario insertado correctamente. Con ID: $lastInsertId</p><hr>";




    // Ejemplo de consulta SELECT con parámetros y tipo de fetch
    $sqlSelect = "SELECT * FROM usuarios WHERE nombre = :nombre";

    $paramsSelect = [
        ':nombre' => ['valor' => 'pepito', 'tipo' => PDO::PARAM_STR, 'longitud' => 50]
    ];
    // $paramsSelect = [
    //     ':nombre' => ['valor' => 'pepitos']
    // ];
    $usuarios = $db->seleccionar($sqlSelect, $paramsSelect, PDO::FETCH_ASSOC);


    echo "<p>Respuesta del select<br>";
    // Mostrar los resultados
    if (!empty($usuarios)) {
        echo "<table><tr><th>Id</th><th>Nombre</th><th>Email</th></tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr><td>" . htmlspecialchars($usuario['id']) . "</td><td>" . htmlspecialchars($usuario['nombre']) . "</td><td>" . htmlspecialchars($usuario['email']) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron usuarios.</p><hr>";
    }
    ?>
</body>

</html>