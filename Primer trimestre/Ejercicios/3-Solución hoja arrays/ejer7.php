<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .resaltado {
            background-color: #ffcccc;
            color: #b30000;
            font-weight: bold;
            font-style: italic;
        }
        .resaltado:hover {
            background-color: #ff9999;
        }
    </style>
</head>

<body>

    <?php

    function mostrarProductos($productos)
    {

    ?>
        <table>
            <caption>Lista de productos</caption>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td class="<?= $producto['nombre'] ?? 'resaltado' ?>">
                            <?= $producto['nombre'] ?? 'Sin identificar' ?>
                        </td>
                        <td class="<?= empty($producto['descripcion']) ? 'resaltado' : '' ?>">
                            <?= !empty($producto['descripcion']) ? $producto['descripcion'] : 'Sin descripción' ?>
                        </td>
                        <td class="<?= isset($producto['precio']) ? '' : 'resaltado' ?>">
                            <?= isset($producto['precio']) ? $producto['precio'] : 'Precio no disponible' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php
    }

    // Array de productos
    $productos = [
        ["nombre" => "Portátil", "descripcion" => "Portátil de alta gama", "precio" => 1200],
        ["nombre" => "Móvil", "descripcion" => "", "precio" => 800],
        ["nombre" => "Tablet", "precio" => 300],
        ["nombre" => "Monitor", "descripcion" => "Monitor 4K"],
        ["nombre" => "Teclado"],
        ["nombre" => "Ratón", "descripcion" => null, "precio" => null],
        ["nombre" => null, "descripcion" => "Impresora multifunción", "precio" => 150],
        ["descripcion" => "Auriculares inalámbricos", "precio" => 50],
        ["nombre" => "Cámara", "precio" => null],
        ["nombre" => "Altavoces", "descripcion" => "", "precio" => null]
    ];

    // Llamada a la función para mostrar los productos
    mostrarProductos($productos);
    ?>