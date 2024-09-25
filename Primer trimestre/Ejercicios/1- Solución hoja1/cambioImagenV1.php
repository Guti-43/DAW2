<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cssImagen.css">
    <title>Imagen Aleatoria</title>
</head>

<body>
    <?php
    $numero = mt_rand(1, 3);
    switch ($numero) {
        case 1:
            echo '<img src="img/arbol.png" alt="Imagen arbol">';
            break;
        case 2:
            echo '<img src="img/fox_terrier.png" alt="Imagen perro">';
            break;
        case 3:
            echo '<img src="img/mafalda.png" alt="Imagen mafalda">';
            break;
    }
    ?>
</body>

</html>