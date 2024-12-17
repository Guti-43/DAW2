<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Alimentos</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>

<body>
    <div class="container">
        <h1>API de Alimentos</h1>
        <div class="divbody">
            <h2>URL API</h2>
            <code>
                <?= $ruta = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>
            </code>
            <code>
                <span class='v'>GET</span> /alimentos
                <br><br>
                <span class='v'> GET </span>/alimentos?inicio=$inicio&cantidad=$cantidad
                <br><br>
                <span class='v'> GET</span> /alimentos/$id
                <br><br>
                <span class='v'> GET</span> /alimentos/$nombre?ord=desc(default asc)
            </code>
            <code>
                <span class='n'>POST</span> /alimentos
                <br>
                {
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"nombre" : "", -> REQUERIDO
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"energia" : "", -> REQUERIDO
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"proteina":"",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"hidratocarbono" :"",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"fibra" : "",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"grasatotal" : "",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"imagen" : "",
                <br>
                }
                <br><br>
                <span class='n'>POST</span> /alimentos/$id
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<i>Importar una imagen</i>
                <br><br>
            </code>
            <code>
                <span class='a'>PUT</span> /alimentos/$id
                <br>
                {
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"nombre" : "",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"energia" : "",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"proteina":"",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"hidratocarbono" :"",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"fibra" : "",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"grasatotal" : "",
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;"imagen" : "",
                <br>
                }
            </code>
            <code>
                <span class='r'> DELETE</span> /alimentos/$id
                <br><br>
            </code>
        </div>

    </div>

</body>

</html>