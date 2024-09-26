<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>

<body>
    <?php
        $comidas = array("arroz", "pollo", "ensalada");
        $bebida = "agua";

        function almuerzo($comidas, $bebida, $postre = "sin postre")
        {
            if (empty($comidas)) {
                echo "Hoy almuerzo sin comida con $bebida y $postre.<br>";
            } else {
                echo "Hoy almuerzo ";

                $cantidad_comidas = count($comidas);
                foreach ($comidas as $index => $comida) {
                    echo $comida;

                    if ($index < $cantidad_comidas - 1) {
                        echo ", ";
                    }
                }

                echo " con $bebida y $postre.<br>";
            }
        }
    ?>
    
    <h1>Ejercicio2</h1>
    <h2><?= almuerzo($comidas, $bebida); ?></h2>
    <h2><?php almuerzo($comidas, $bebida, "flan"); ?></h2>
    <h2><?php almuerzo(array(), $bebida); ?></h2>
</body>

</html>