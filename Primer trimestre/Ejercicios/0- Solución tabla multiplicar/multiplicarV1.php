<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicar V1</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <br>
    <table>
        <caption>Dibujar tabla de Multiplicar V1</caption>
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
                echo "<tr>";
                echo "<td>$n</td>";
                echo "<td>x</td>";
                echo "<td>$i</td>";
                echo "<td>=</td>";
                echo "<td>" . $n * $i . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>

</html>