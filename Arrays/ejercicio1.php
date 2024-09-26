<?php
    $productos = array(
        array('nombre' => 'Portátil', 'precio' => 800, 'stock' => 10),
        array('nombre' => 'Móvil', 'precio' => 500, 'stock' => 20),
        array('nombre' => 'Tablet', 'precio' => 300, 'stock' => 15)
    );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>

    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto; /* Centra la tabla horizontalmente */
        }

        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ajusta la altura al 100% de la ventana */
        }
    </style>
</head>

<body>

<table>
        <tr>
            <th colspan="3">Productos</th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>

        <?php
            foreach ($productos as $producto) {
        ?>
            <tr>
                <?php foreach ($producto as $valor) { ?>
                    <td><?= $valor ?></td>
                <?php } ?>
            </tr>
        <?php
            }
        ?>

    </table>
</body>
</html>