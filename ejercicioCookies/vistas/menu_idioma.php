<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <meta http-equiv="Content-Language" content="en, es, fr">
    <link rel="shortcut icon" href="img/icono.png" type="image/png">
    <title>Seleccionar idioma</title>

</head>

<body>
    <h1>Selecciona tu idioma</h1>
    <form action="index.php?accion=cambiarIdioma" method="post">
        <label>Idioma:</label>
        <select name="idioma" id="idioma">
            <option value="es">Español</option>
            <option value="en">Inglés</option>
            <option value="fr">Francés</option>
        </select>
        <div class="boton">
            <button type="submit">Guardar idioma</button>
        </div>
    </form>
</body>

</html>