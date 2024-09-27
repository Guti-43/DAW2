<?php
function almuerzo($comidas, $bebida, $postre = "sin postre")
{
    // Construimos una cadena para las comidas usando un bucle foreach
    $comidas_lista = "";
    foreach ($comidas as $comida) {
        // Si no es el primer elemento, añadimos una coma
        if ($comidas_lista != "") {
            $comidas_lista .= ", ";
        }
        $comidas_lista .= $comida;
    }

    // Imprimimos el mensaje con el almuerzo
    echo "<br>Hoy almuerzo $comidas_lista con $bebida y $postre.";
}

// Llamada a la función con dos argumentos
almuerzo(["arroz", "pollo", "ensalada"], "agua");

// Llamada a la función con tres argumentos
almuerzo(["arroz", "pollo", "ensalada"], "agua", "flan");

// Llamada a la función con un array vacío
almuerzo([], "agua");
