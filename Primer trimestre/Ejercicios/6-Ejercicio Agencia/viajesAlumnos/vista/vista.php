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
                <th>Costo Total</th>
            </tr>

        </table>

    <?php elseif ($tipo === 'empleados'): ?>
        <h2>Empleados</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Puesto</th>
            </tr>

        </table>

    <?php elseif ($tipo === 'usuarios'): ?>
        <h2>Usuarios</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tipo</th>
            </tr>

        </table>


    <?php endif; ?>

</body>

</html>