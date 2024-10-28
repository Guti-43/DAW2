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
    <form method="post" action="index.php?accion=cambiarIdioma">
        <label>Idioma:</label>
        <select name="idioma">
            <option value="es" <?= $idiomaSeleccionado == 'es' ? 'selected' : ''; ?>>Español</option>
            <option value="en" <?= $idiomaSeleccionado == 'en' ? 'selected' : ''; ?>>Inglés</option>
            <option value="fr" <?= $idiomaSeleccionado == 'fr' ? 'selected' : ''; ?>>Francés</option>
        </select>
        <div class="boton">
            <button type="submit">Guardar idioma</button>
        </div>
    </form>
</body>

</html>