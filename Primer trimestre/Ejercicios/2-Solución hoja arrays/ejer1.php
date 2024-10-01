<?php
// Crear array multidimensional con información de productos
$productos = [
    ["nombre" => "Portátil", "precio" => 800, "stock" => 10],
    ["nombre" => "Móvil", "precio" => 500, "stock" => 20],
    ["nombre" => "Tablet", "precio" => 300, "stock" => 15]
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Mostrar tabla con información de productos en HTML -->
    <main>
        <table>
            <caption>Productos</caption>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['precio'] ?></td>
                        <td><?= $producto['stock'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>