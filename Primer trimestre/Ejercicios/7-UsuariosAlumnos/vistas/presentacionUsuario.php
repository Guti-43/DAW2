<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Presentación Usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <h1>Usuario Regular</h1>

    <table>
        <tr>
            <td>
                Imagen de Perfil
            </td>
            <td> Debe mostrar la imagen</td>
            <td>
                Nombre
            </td>
            <td>Debe mostrar el nombre </td>
        </tr>
    </table>
    <h2>Cambiar Imagen de Perfil</h2>
    <form>
        <input type="file" name="imagen_perfil" accept="image/png">
        <input type="hidden" name="nombre_usuario" value="Variable con el nombre del usuario">
        <button type="submit">Subir Imagen</button>
    </form>
</body>

</html>