<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color de Fondo Aleatorio</title>
    <style>
        body {
            background-color: <?php echo 'rgb(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ')'; ?>;
        }
    </style>
</head>

<body>
</body>

</html>