<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Presentación Usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
    $imagenUsuario = 'imagenes_perfil/' . $usuario->obtenerNombre() . '_perfil.png';
    $imagenFinal = file_exists($imagenUsuario) ? $imagenUsuario : 'imagenes_perfil/userDefecto.png';
    ?>
    <h1>Usuario Regular</h1>

    <table>
        <tr>
            <td>
                Imagen de Perfil
            </td>
            <td> <img src="<?= $imagenFinal ?>" alt="Imagen de Usuario"></td>
            <td>
                Nombre
            </td>
            <td><?= $usuario->obtenerNombre(); ?></td>
        </tr>
    </table>
    <h2>Cambiar Imagen de Perfil</h2>
    <form method="post" action="index.php?accion=subir_imagen" enctype="multipart/form-data">
        <input type="file" name="imagen_perfil" accept="image/png">
        <input type="hidden" name="nombre_usuario" value="<?= $usuario->obtenerNombre(); ?>">
        <button type="submit">Subir Imagen</button>
    </form>
</body>

</html>