<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Presentación Usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
    $imagenUsuario = 'imagenes_perfil/' . $nombre . '_perfil.png';
    $imagenFinal = file_exists($imagenUsuario) ? $imagenUsuario : 'imagenes_perfil/userDefecto.png';
    ?>
    <table>
        <tr>
            <td colspan="2">
                <h2>Usuario Regular</h2>
            </td>
            <td colspan="2">
                <form method="post" action="index.php?accion=cerrar_sesion">
                    <button type="submit">Cerrar</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                Imagen de Perfil
            </td>
            <td> <img src="<?= $imagenFinal ?>" alt="Imagen de Usuario"></td>
            <td>
                Nombre
            </td>
            <td><?= $nombre ?></td>
        </tr>
    </table>
    <h2>Cambiar Imagen de Perfil</h2>
    <form method="post" action="index.php?accion=subir_imagen" enctype="multipart/form-data">
        <input type="file" name="imagen_perfil" accept="image/png">
        <input type="hidden" name="nombre_usuario" value="<?= $nombre ?>">
        <button type="submit">Subir Imagen</button>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>

</html>