<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagen Aleatoria</title>
    <link rel="stylesheet" href="css/cssImagen.css">
</head>

<body>
    <?php
    $numero = mt_rand(1, 3);
    $imagen = '';
    $descripcion = '';

    switch ($numero) {
        case 1:
            $imagen = 'img/arbol.png';
            $descripcion = 'Imagen árbol';
            break;
        case 2:
            $imagen = 'img/fox_terrier.png';
            $descripcion = 'Imagen perro';
            break;
        case 3:
            $imagen = 'img/mafalda.png';
            $descripcion = 'Imagen mafalda';
            break;
    }
    ?>
    <figure>
        <picture>
            <img src="<?= $imagen ?>" alt="<?= $descripcion ?>">
        </picture>
        <figcaption><?= $descripcion ?> (Número aleatorio: <?= $numero ?>)</figcaption>
    </figure>
</body>

</html>