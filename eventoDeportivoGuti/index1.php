<!-- Formulario -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento Deportido</title>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
    <h1>Formulario del Evento Deportivo</h1>

    <div class="cuerpo">
        <form action="procesar.php" method="post">
            <label>Nombre del Evento:</label>
            <input type="text" name="nombre" value="<?= isset($nombre) ? $nombre : '' ?>">
            <label>Fecha:</label>
            <input type="date" name="fecha" value="<?= isset($fecha) ? $fecha : '' ?>">
            <label>Ubicación</label>
            <input type="text" name="ubicacion" value="<?= isset($ubicacion) ? $ubicacion : '' ?>">
            <label>Deportes:</label>
            <select name="deportes[]" multiple>
                <option value="Fútbol">Fútbol</option>
                <option value="Baloncesto">Baloncesto</option>
                <option value="Voleibol">Voleibol</option>
                <option value="Tenis">Tenis</option>
                <option value="Natación">Natación</option>
                <option value="Atletismo">Atletismo</option>
            </select>

            <button type="submit">Registrar</button>
        </form>
        <div class="errores">
            <?php
                foreach($errores as $error){
            ?>
                <p><?= $error ?></p>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>