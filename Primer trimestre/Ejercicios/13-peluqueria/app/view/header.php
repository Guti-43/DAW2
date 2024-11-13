<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/peluqueria.css">
    <link rel="shortcut icon" href="assets/img/peluqueria.png" sizes="256x256" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Aplicación de Peluquería</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="header-container">
                <div class="logo">
                    <img src="assets/img/peluqueria.png" alt="Logo Peluquería">
                </div>
                <nav>
                    <ul>
                        <?php if (isset($_SESSION['usuario'])): ?>

                            <li><a href="?controlador=usuarios&accion=reservar">Reservar</a></li>

                            <li><a href="?controlador=usuarios&accion=logout">Logout</a></li>
                            <li>
                                <div class="usuario-container">
                                    <img src="<?= $_SESSION['usuario']['avatar'] ?>" alt="Icono Usuario" class="icono-usuario">
                                    <span><?= htmlspecialchars($_SESSION['usuario']['nombre']); ?></span>
                                </div>
                            </li>
                        <?php else: ?>
                            <li><a href="?controlador=usuarios&accion=login">Login</a></li>
                            <li><a href="?controlador=usuarios&accion=home">Home</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>
        <main>