<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="en, es, fr">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="img/icono.png" type="image/png">
    <title>Página principal</title>
    <style>
        body {
            background-image: url('<?= $fondo; ?>');
        }
    </style>
</head>

<body>
    <!-- Menú lateral -->

    <div class="sidebar">
        <h3>Configuraciones</h3>
        <a href="index.php?accion=cambiarIdioma">Cambiar idioma</a><br>
        <a href="index.php?accion=cambiarFondo">Cambiar imagen de fondo</a><br>
        <a href="index.php?accion=personalizarMenu">Personalizar menú</a>
    </div>

    <div class="main-content">
        <!-- Menú horizontal -->
        <ul>
            <?php foreach ($menu as $item): ?>
                <li><a href="#"><?= $item; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <!-- Mensaje de bienvenida -->
        <h1><?= $mensajeMostrar ?></h1>
    </div>
</body>

</html>