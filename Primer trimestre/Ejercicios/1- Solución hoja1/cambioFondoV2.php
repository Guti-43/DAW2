<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Fondo</title>
    <style>
        body {
            background-color: <?= 'rgb(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ')'; ?>;
        }
    </style>
</head>

<body>
    <h1>Fondo de color aleatorio</h1>
</body>

</html>