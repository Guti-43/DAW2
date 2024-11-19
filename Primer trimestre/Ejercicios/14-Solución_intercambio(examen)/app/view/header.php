<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/icono.png" type="image/png" sizes="512x512">
    <title>Intercambio</title>
    <link rel="stylesheet" href="<?= Config::$estilo ?>">
</head>

<body>
    <header>
        <h1>Intercambio Sorpresa</h1>
        <nav>
            <ul>
                <li><a href="?controlador=session&accion=home">Home</a></li>
                <?php if (!isset($_SESSION['rol'])): ?>
                    <li><a href="?controlador=session&accion=formulario">Login</a></li>
                <?php elseif ($_SESSION['rol'] == 'usuario'): ?>
                    <li><a href="?controlador=usuario&accion=mensajes">Mensajes</a></li>
                    <li><a href="?controlador=articulo">Artículos</a></li>
                    <li><a href="?controlador=articulo&accion=intercambiar">Intercambio</a></li>
                    <li><a href="index.php?controlador=session&accion=logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="?controlador=session">Administración</a></li>
                    <li><a href="index.php?controlador=session&accion=logout">Logout</a></li>
                <?php endif; ?>
            </ul>
            <?php if (isset($_SESSION['rol'])): ?>
                <div class="user-info">
                    <img src="<?= $_SESSION['foto']; ?>" alt="Avatar" class="avatar">
                    <span><?= $_SESSION['nombre']; ?></span>
                </div>
            <?php endif; ?>
        </nav>
    </header>
    <main>