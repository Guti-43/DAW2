<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Agencia de Viajes</title>
    <link rel="stylesheet" href="vista/styles.css">
</head>

<body>

    <h1>Información de la Agencia de Viajes</h1>

    <?php if ($tipo === 'viajes'): ?>
        <h2>Viajes</h2>
        <table>
            <tr>
                <th>Destino</th>
                <th>Descripción</th>
                <th>Precio por Día</th>
                <th>Imagen</th>
                <th>Coste Total</th>
            </tr>
            <?php foreach ($viajes as $viaje): ?>
                <tr>
                    <td><?= $viaje->getNombre() ?></td>
                    <td><?= $viaje->getDescripcion() ?></td>
                    <td><?= $viaje->getPrecioPorDia() ?> €</td>
                    <td><img src="<?= $viaje->getImagen() ?>" width="200"></td>
                    <td><?= $viaje->calcularPrecioTotal($dias) ?> €</td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php elseif ($tipo === 'empleados'): ?>
        <h2>Empleados</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Puesto</th>
            </tr>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?= $empleado->getNombre() ?></td>
                    <td><?= $empleado->getEmail() ?></td>
                    <td><?= $empleado->getPuesto() ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php elseif ($tipo === 'usuarios'): ?>
        <h2>Usuarios</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tipo</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario->getNombre() ?></td>
                    <td><?= $usuario->getEmail() ?></td>
                    <td><?= $usuario->getTipo() ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <p>Tipo de información no válida.</p>
    <?php endif; ?>

</body>

</html>