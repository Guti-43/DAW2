<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <meta http-equiv="Content-Language" content="en, es, fr">
    <link rel="shortcut icon" href="img/icono.png" type="image/png">
    <title>Seleccionar Fondo</title>
</head>

<body>
    <h1>Selecciona tu imagen de fondo</h1>
    <form action="index.php?accion=cambiarFondo" method="post">
        <label>Elige una imagen de fondo:</label><br>
        <input type="radio" name="fondo" value="img/fondo1.jpg">Fondo 1<br><br>
        <input type="radio" name="fondo" value="img/fondo2.jpg">Fondo 2<br><br>
        <input type="radio" name="fondo" value="img/fondo3.jpg">Fondo 3<br><br>
        <div class="boton">
            <button type="submit">Guardar Fondo</button>
        </div>
    </form>
</body>

</html>