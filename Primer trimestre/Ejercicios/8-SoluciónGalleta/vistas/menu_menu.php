<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <meta http-equiv="Content-Language" content="en, es, fr">
    <link rel="shortcut icon" href="img/icono.png" type="image/png">
    <title>Personalizar menú</title>
</head>

<body>
    <h1>Personaliza tu menú</h1>
    <form method="post" action="index.php?accion=personalizarMenu">
        <fieldset>
            <legend>Elige los elementos del menú:</legend>
            <label><input type="checkbox" name="menu[]" value="Inicio" <?= in_array('Inicio', $menuSeleccionado) ? 'checked' : ''; ?>> Inicio</label>
            <label><input type="checkbox" name="menu[]" value="Perfil" <?= in_array('Perfil', $menuSeleccionado) ? 'checked' : ''; ?>> Perfil</label>
            <label><input type="checkbox" name="menu[]" value="Configuraciones" <?= in_array('Configuraciones', $menuSeleccionado) ? 'checked' : ''; ?>> Configuraciones</label>
            <label> <input type="checkbox" name="menu[]" value="Contacto" <?= in_array('Contacto', $menuSeleccionado) ? 'checked' : ''; ?>> Contacto</label>
        </fieldset>
        <div class="boton">
            <button type="submit">Guardar Menú</button>
        </div>
    </form>

    <p><?= $error ?? ''; ?></p>
</body>

</html>