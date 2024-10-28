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
    <form method="post" action="index.php?accion=cambiarFondo">
        <fieldset>
            <legend>Elige una imagen de fondo:</legend>
            <label><input type="radio" name="fondo" value="img/fondo1.jpg" <?= $fondoSeleccionado == 'img/fondo1.jpg' ? 'checked' : ''; ?>> Fondo 1</label>
            <label><input type="radio" name="fondo" value="img/fondo2.jpg" <?= $fondoSeleccionado == 'img/fondo2.jpg' ? 'checked' : ''; ?>> Fondo 2</label>
            <label><input type="radio" name="fondo" value="img/fondo3.jpg" <?= $fondoSeleccionado == 'img/fondo3.jpg' ? 'checked' : ''; ?>> Fondo 3</label>
        </fieldset>
        <div class="boton">
            <button type="submit">Guardar Fondo</button>
        </div>
    </form>
</body>

</html>