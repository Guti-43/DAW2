<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>
<body>
    <?php
        $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X",
        "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K",
        "E");
        
        function letraDNI($letras, $dni){
            echo "Los números de su DNI son: $dni <br>";
            $letra = $dni % 23;

            foreach($letras as $indice => $l){
                if ($indice == $letra) $letra = $l;
            }

            echo "Su letra es: $letra <br>";

            echo "Este es su DNI completo: ";
            return $dni . $letra;
        }
    ?>

    <h1>Letra del DNI sospresa</h1>
    <h2><?= letraDNI($letras, 70974400); ?></h2>
</body>
</html>