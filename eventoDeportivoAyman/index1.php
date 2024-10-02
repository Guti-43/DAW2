<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
        <h1>Formulario de Evento Deportivo</h1>
        <form action="procesar2.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre del Evento</label>
            <input id="nombre" type="text" name="nombre" value="<?= $nombre ?? '' ?>">
            <label for="fecha">Fecha: </label>
            <input id="fecha" type="date" name="fecha" value="<?= $fecha ?? '' ?>">
            <label for="ubicacion">Ubicacion: </label>
            <input id="ubicacion" type="text" name="ubicacion" value="<?= $ubicacion ?? '' ?>">
            <label for="deportes">Deportes: </label>
            <select id="deportes" name="deportes[]" multiple value="<?= $deportes ?? '' ?>">
                <option value="futbol">Futbol</option>
                <option value="baloncesto">Baloncesto</option>
                <option value="tenis">Tenis</option>
                <option value="natacion">Natacion</option>
            </select>
            <br>
            <input type="hidden" name="MAX_FILE_SIZE" value="209715">
            <label for="arch">Selecciona un archivo: </label>
            <input id="arch" type="file" name="archivo" accept="image/*" required>
            
            <input type="submit" value="Registrar"> Registrar</input>
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