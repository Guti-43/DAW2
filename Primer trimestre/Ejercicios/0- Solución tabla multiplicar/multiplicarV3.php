<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicar V3</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <br>
    <table>
        <caption>Dibujar tabla de Multiplicar V3</caption>
        <thead>
            <tr>
                <th>Operando 1</th>
                <th></th>
                <th>Operando 2</th>
                <th></th>
                <th>Operación</th>
                <th>Resultado</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $n = 5;

            for ($i = 0; $i <= 10; $i++) {
                $resultado = $n * $i;
                echo <<<MULTIPLICACION
                <tr>
                    <td>$n</td>
                    <td>x</td>
                    <td>$i</td>
                    <td>=</td>
                    <td>$n * $i</td>                   
                    <td>$resultado</td>
                </tr>
                MULTIPLICACION;
            }
            ?>
        </tbody>
    </table>
</body>

</html>