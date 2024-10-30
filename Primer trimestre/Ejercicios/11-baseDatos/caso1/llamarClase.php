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
    // Incluir la clase BaseDeDatos
    require_once 'BaseDatos.php';

    // Obtener la instancia de la base de datos
    $db = BaseDatos::obtenerInstancia();

    // Ejemplo de consulta INSERT
    $sqlInsert = "INSERT INTO usuarioss (nombre, email) VALUES (:nombre, :email)";
    $paramsInsert = [
        ':nombre' => 'Juan',
        ':email' => 'juan@example.com'
    ];
    $lastInsertId = $db->insertar($sqlInsert, $paramsInsert);
    echo "<p>Respuesta del insert: Usuario insertado correctamente. Con ID: $lastInsertId</p>";

    // Ejemplo de consulta SELECT
    $sqlSelect = "SELECT * FROM usuarios";
    $usuarios = $db->seleccionar($sqlSelect);

    // Mostrar los resultados
    if (!empty($usuarios)) {
        echo "<table><tr><th>Id</th><th>Nombre</th><th>Email</th></tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr><td>" . htmlspecialchars($usuario['id']) . "</td><td>" . htmlspecialchars($usuario['nombre']) . "</td><td>" . htmlspecialchars($usuario['email']) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron usuarios.</p>";
    }
    ?>
</body>

</html>