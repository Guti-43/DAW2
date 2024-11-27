<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Generar Hash de Contraseña</title>
    <style>
        .hash-container {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            word-break: break-all;
        }
    </style>
</head>

<body>
    <h2>Generar Hash de Contraseña</h2>
    <form method="post" action="">
        <label for="password">Introduce tu contraseña:</label>
        <input type="text" id="password" name="password" required>
        <button type="submit">Generar Hash</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        echo "<div class='hash-container'><p>El hash generado para <strong>" . $_POST['password'] . " </strong>es:</p><p>" . $hash . "</p></div>";
        echo "<p>La longitud del hash es: " . mb_strlen($hash) . " caracteres.</p>";
    }
    ?>
</body>

</html>