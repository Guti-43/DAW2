<?php
function almuerzo($comidas, $bebida, $postre = "sin postre")
{
    // Verificamos si el array de comidas está vacío
    if (empty($comidas)) {
        $comidas_lista = "sin comida";
    } else {
        // Construimos una cadena para las comidas usando un bucle foreach
        $comidas_lista = "";
        foreach ($comidas as $comida) {
            // Si no es el primer elemento, añadimos una coma
            if ($comidas_lista != "") {
                $comidas_lista .= ", ";
            }
            $comidas_lista .= $comida;
        }
    }

    // Imprimimos el mensaje con el almuerzo
    echo "Hoy almuerzo $comidas_lista con $bebida y $postre.";
}

// Llamada a la función con dos argumentos
almuerzo(["arroz", "pollo", "ensalada"], "agua");

echo "<br>";

// Llamada a la función con tres argumentos
almuerzo(["arroz", "pollo", "ensalada"], "agua", "flan");

echo "<br>";

// Llamada a la función con un array vacío
almuerzo([], "agua");
