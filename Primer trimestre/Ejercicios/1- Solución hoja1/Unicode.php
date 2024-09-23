<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Unicode</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <table>
        <caption>Tabla Unicode</caption>
        <thead>
            <tr>
                <?php for ($i = 0; $i < 8; $i++) { ?>
                    <th>Código</th>
                    <th>Carácter</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php for ($i = 0; $i <= 1000; $i++) { ?>
                    <?php if ($i % 8 == 0 && $i != 0) { ?>
            </tr>
            <tr>
            <?php } ?>
            <td><?= $i ?></td>
            <td><?= "&#$i;" ?></td>
        <?php } ?>
            </tr>
        </tbody>
    </table>
</body>

</html>