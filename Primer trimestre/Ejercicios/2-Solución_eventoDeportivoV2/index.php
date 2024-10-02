<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Evento Deportivo</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Formulario de Evento Deportivo</h1>
    <br>
    <form action="procesar.php" method="post" enctype="multipart/form-data">
        <label for="nombre_evento">Nombre del Evento:</label>
        <input type="text" id="nombre_evento" name="nombre_evento">
        <br>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha">
        <br>
        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion">
        <br>
        <label for="deportes">Deportes:</label>
        <select id="deportes" name="deportes[]" multiple>
            <option value="fútbol">Fútbol</option>
            <option value="baloncesto">Baloncesto</option>
            <option value="tenis">Tenis</option>
            <option value="natación">Natación</option>
        </select>
        <br>
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152"> <!-- 2MB en bytes -->
        <label for="archivo">Selecciona un archivo:</label>
        <input type="file" name="nombreCampo" id="archivo" accept="image/*" multiple>
             
        <input type="submit" value="Registrar">
    </form>
    <?php
    if (!empty($errores)) {
    ?>
        <div id="errores">
            <?= $erroresMostrar; ?>
        </div>
    <?php
    }
    ?>
</body>

</html>