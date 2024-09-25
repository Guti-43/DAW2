<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicar V2</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <br>
    <table>
        <caption>Dibujar tabla de Multiplicar V2</caption>
        <thead>
            <tr>
                <th>Operando 1</th>
                <th></th>
                <th>Operando 2</th>
                <th></th>
                <th>Resultado</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $n = 5;
            for ($i = 0; $i <= 10; $i++) {
            ?>
                <tr>
                    <td><?= $n ?></td>
                    <td>x</td>
                    <td><?= $i ?></td>
                    <td>=</td>
                    <td><?= $n * $i ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

</html>