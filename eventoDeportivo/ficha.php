<?php
$errores=[];
if (empty($errores)) {
    $array = [
        "Nombre del Evento" => $nombre,
        "Fecha" => $fecha,
        "Ubicacion" => $ubicacion,
        "Deportes" => $deportes
    ];
    echo "<h2>Ficha del Evento Deportivo</h2><table>";
    foreach ($array as $elemento => $res) {
        if ($elemento !== "Deportes") {
            echo "<tr><td class=\"titulo\">$elemento</td><td>$res</td></tr>";
        } else {
            $cadena = "";
            foreach ($res as $dep) {
                $cadena = implode(",",$dep);
            }
            echo "<tr><td class=\"titulo\">$elemento</td><td>$cadena</td></tr>";
        }
    }
    echo "<tr><td class=\"titulo\">Archivo</td><td><img src=images.$nombreArchivo</td></tr>";
    echo "</table>";
}
 