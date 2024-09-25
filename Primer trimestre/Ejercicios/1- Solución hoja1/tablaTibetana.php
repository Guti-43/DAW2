<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Tibetana</title>

</head>

<body>
    <table>
        <caption>Tabla Tibetana</caption>
        <thead>
            <tr>
                <?php
                for ($i = 1; $i < 7; $i++) { ?>
                    <th>Código</th>
                    <th>Símbolo</th>
                <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $contador = 0;
                for ($i = 3840; $i < 4058; $i++) {
                    $contador++;
                ?>

                    <td><?= $i ?></td>
                    <td><?= "&#$i;" ?></td>
                <?php
                    if ($contador % 6 == 0) echo "</tr><tr>";
                }
                ?>
            </tr>
        </tbody>
    </table>

</body>

</html>