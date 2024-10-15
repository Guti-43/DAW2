<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <h1>Formulario login</h1>
    <form method="post" action="index.php?accion=iniciar_sesion">
        <fieldset>
            <legend>Datos de Inicio de Sesión</legend>
            <label for="nombre_usuario">Nombre de usuario</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario">
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña">
        </fieldset>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>

</html>