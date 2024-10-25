<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <h1>Foro IES Venancio Blanco</h1>
        <nav>
            <ul>
                <li><a href="index.php?accion=verTemas">Ver Temas</a></li>
                <?php if (TRUE): ?> <!--  Cambiar por la condición de si el usuario está logueado -->
                    <li><a href="index.php?accion=agregarTema">Agregar Tema</a></li>
                    <li><a href="index.php?accion=logout">Cerrar Sesión</a></li>
                    <li><a href="index.php?accion=verPerfil">Perfil de <?= 'PEPEITO' ?></a></li>
                    <li><a href="index.php?accion=verComentarios">Comentarios</a></li>
                    <li><a href="index.php?accion=votarTemas">Votar Temas</a></li>
                    <li>
                        <img src="<?= "Ruta a la imagen de PEPITO" ?>" alt="Foto de Perfil" />
                    </li>
                <?php else: ?>
                    <li><a href="index.php?accion=cargarLogin">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>