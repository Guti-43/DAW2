<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link rel="stylesheet" href="vista/styles.css">
</head>

<body>
    <table>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Páginas</th>
            <th>Tipo de Publicación</th>
            <th>Precio Final (€)</th>
        </tr>
        <?php foreach ($publicaciones as $publicacion): ?>
            <tr>
                <td><?= $publicacion->getTitulo() ?></td>
                <td><?= $publicacion->getAutor() ?></td>
                <td><?= $publicacion->getAnioPublicacion() ?></td>
                <td><?= $publicacion->getNumeroPaginas() ?></td>
                <td><?= $publicacion->tipoPublicacion ?></td>
                <td><?= $publicacion->precioFinal ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">Precio Total</td>
            <td><?= $totalPrecio ?> €</td>
        </tr>
    </table>
</body>

</html>