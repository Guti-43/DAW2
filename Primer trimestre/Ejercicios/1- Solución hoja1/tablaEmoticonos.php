<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Emoticonos</title>
</head>

<body>
    <table>
        <caption>Tabla Emoticonos</caption>
        <thead>
            <tr>
                <?php
                for ($i = 1; $i < 7; $i++) { ?>
                    <th>Código</th>
                    <th>Emojic</th>
                <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $contador = 0;
                for ($i = 128000; $i < 128702; $i++) {
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