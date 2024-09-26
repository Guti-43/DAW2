<?php
    $productos = [
        ['nombre' => 'Portátil', 'descripcion' => 'Portátil de alta gama', 'precio' => 1200],
        ['nombre' => 'Móvil', 'descripcion' => '', 'precio' => 800],
        ['nombre' => 'Tablet', 'descripcion' => '', 'precio' => 300],
        ['nombre' => 'Monitor', 'descripcion' => 'Monitor 4K', 'precio' => null],
        ['nombre' => 'Teclado', 'descripcion' => '', 'precio' => null],
        ['nombre' => 'Ratón', 'descripcion' => '', 'precio' => null],
        ['nombre' => '', 'descripcion' => 'Impresora multifunción', 'precio' => 150],
        ['nombre' => '', 'descripcion' => 'Auriculares inalámbricos', 'precio' => 50],
        ['nombre' => 'Cámara', 'descripcion' => '', 'precio' => null],
        ['nombre' => 'Altavoces', 'descripcion' => '', 'precio' => null],
    ];    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>

    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
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
            height: 100vh;
        }
    </style>
</head>
<body>
<?php
        function mostrarProductos($productos) {
            foreach ($productos as $producto) {
                echo "<tr>";
                $nombre = isset($producto['nombre']) && !empty($producto['nombre']) ? $producto['nombre'] : "Sin identificar";
                echo "<td>$nombre</td>";

                $descripcion = isset($producto['descripcion']) && !empty($producto['descripcion']) ? $producto['descripcion'] : "Sin descripción";
                echo "<td>$descripcion</td>";

                $precio = isset($producto['precio']) && !empty($producto['precio']) ? $producto['precio'] : "Precio no disponible";
                echo "<td>$precio</td>";

                echo "</tr>";
            }
        }
    ?>
    <table>
        <tr>
            <th colspan="3">Lista de productos</th>
        </tr>

        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
        </tr>
         
        <?= mostrarProductos($productos) ?>
    </table>
</body>
</html>