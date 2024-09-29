<!-- Tabla con respuesta -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha</title>
 </head>
 <body>
    <h2>Ficha del Evento Deportivo</h2>
    <div class="resultado">
        <table>
            <tr>
                <td><b>Nombre del Evento</b></td>
                <td> <?= $nombre ?> </td>
            </tr>
            <tr>
                <td><b>Fecha</b></td>
                <td> <?= $fecha ?> </td>
            </tr>
            <tr>
                <td><b>Ubicación</b></td>
                <td> <?= $ubicacion ?> </td>
            </tr>
            <tr>
                <td><b>Deportes</b></td>
                <td>
                    <?php 
                        foreach($deportes as $deporte) {
                            echo $deporte;

                            if ($deporte !== end($deportes)) {
                                echo ', ';
                            }
                        }
                    ?>
                </td>
            </tr>
            
        </table>
    </div>
 </body>
 </html>