<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Presentación Administrador</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <h1>Usuario Administrador</h1>
    <table>
        <tr>
            <td>
                Imagen de Perfil
            </td>
            <td><img src="imagenes_perfil/adminDefecto.png" alt="Imagen del Administrador"></td>
            <td>
                Nombre
            </td>
            <td><?= $usuario->obtenerNombre(); ?></td>
        </tr>
    </table>

    <h2>Añadir un nuevo Usuario</h2>
    <form method="post" action="index.php?accion=anadir_usuario">
        <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" value="">
        <input type="password" name="contrasena" placeholder="Contraseña" value="">
        <button type="submit">Añadir Usuario</button>
    </form>
    <?php if (!empty($usuarios) || !empty($error)):
        include 'vistas/listadoUsuarios.php';
    endif; ?>

</body>

</html>