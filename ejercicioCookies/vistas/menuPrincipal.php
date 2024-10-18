<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta http-equiv="Content-Language" content="en, es, fr">
    <link rel="shortcut icon" href="img/icono.png" type="image/png">
    <title>Página principal</title>
    <style>
        body {
            background-image: url(" <?= $this->modelo->getFondo(); ?> ");
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h3>Configuraciones</h3>
        <a href="index.php?accion=cambiarIdioma">Cambiar idioma</a><br>
        <a href="index.php?accion=cambiarFondo">Cambiar imagen de fondo</a><br>
        <a href="index.php?accion=personalizarMenu">Personalizar menú</a><br>
    </div>

    <div class="main-content">
        <ul>
           <!-- Elementos del menú -->
        </ul>
        <h1> <?= $this->modelo->getMensajeBienvenida(); ?> </h1>
    </div>
</body>

</html>