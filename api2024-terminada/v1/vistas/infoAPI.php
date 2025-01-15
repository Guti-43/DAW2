<?php
include "ejemplos.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vistas/api.css" type="text/css">
    <link rel="shortcut icon" href="vistas/icono.png" type="image/png" sizes="512x512">
    <title>API Alimentos</title>

</head>

<body>
    <div class="container">
        <h1>API de Alimentos</h1>
        <div class="divbody">
            <h2>URL API</h2>
            <code>
                <span class='b'>URL BASE </span><?= $ruta = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>
            </code>
            <h2>Endpoints</h2>

            <div class="api-endpoint">
                <code><span class='v'>GET</span> /alimentos</code>
                <p>JSON que contiene un array de objetos con los campos con la información de todos los alimentos que existen en la base de datos</p>
                <details>
                    <summary>Ver ejemplo JSON enviado desde el ENDPOINT</summary>
                    <pre class="json">  <code><span class='v'>GET</span> <?= $ruta = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>/alimentos</code><br><br><?= style_json($json1) ?>
                    </pre>
                </details>
            </div>

            <div class="api-endpoint">
                <code> <span class='v'> GET </span>/alimentos?inicio=$inicio&cantidad=$cantidad</code>
                <p> JSON que contiene un array con la información de todos los alimentos paginados, indicando el registro de inicio y la cantidad de registros que deben mostrarse</p>
                <details>
                    <summary>Ver ejemplo JSON enviado desde el ENDPOINT </summary>
                    <pre class="json">  <code><span class='v'>GET</span> <?= $ruta = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>?inicio=3&cantidad=2</code><br><br><?= style_json($json2) ?>
                    </pre>
                </details>
            </div>

            <div class="api-endpoint">
                <code><span class='v'>GET</span> /alimentos/$id</code>
                <p>Objeto JSON contiene la información del alimento con id indicado</p>
                <details>
                    <summary>Ejemplo JSON enviado desde el ENDPOINT</summary>
                    <pre class="json">  <code><span class='v'>GET</span> <?= $ruta = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>/alimentos/5</code><br><br><?= style_json($json3) ?></pre>
                </details>
            </div>


            <div class="api-endpoint">
                <code><span class='v'>GET</span> /alimentos/$nombre?ord=desc(default asc)</code>
                <p>Array JSON contiene objetos con la información del alimento o alimentos con nombre indicado</p>
                <details>
                    <summary>Ejemplo JSON enviado desde el ENDPOINT</summary>
                    <pre class="json">  <code><span class='v'>GET</span> <?= $ruta = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>/alimentos/pan?orden=desc</code><br><br><?= style_json($json4) ?></pre>
                </details>
            </div>
            <!-- **********************************************************POST************************************************************************* -->
            <div class="api-endpoint">
                <code>
                    <span class='n'>POST</span> /alimentos
                    <br>
                    {
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;"nombre" : "", -> REQUERIDO
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;"energia" : "", -> REQUERIDO
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;"proteina":"", -> REQUERIDO
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;"hidratocarbono" :"", -> REQUERIDO
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;"fibra" : "", -> REQUERIDO
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;"grasatotal" : "", -> REQUERIDO
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;"imagen" : "BASE64", -> REQUERIDO
                    <br>
                    }
                </code>
                <p>Crear un nuevo registro. Todos los campos son obligatorios y la imagen debe estar codificada en BASE64</p>
                <details>
                    <summary>Ejemplo JSON que se espera el ENDPOINT</summary>
                    <pre class="json">   <code><span class='n'>POST</span> <?= $ruta = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>/alimentos</code><br><br><?= style_json($json5) ?><br><br>  <code>Respuesta JSON</code><br><?= style_json($json6) ?></pre>
                </details>
            </div>

            <!-- **********************************************************PUT************************************************************************* -->
            <div class="api-endpoint">
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
                <p>Actualizar un registro existente, pueden actualizarse cualquiera de los campos anteriores o varios</p>
                <details>
                    <summary>Ejemplo JSON que se espera el ENDPOINT</summary>
                    <pre class="json">   <code><span class='a'>PUT</span> <?= $ruta = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>/alimentos/9</code><br><br><?= style_json($json7) ?></pre>
                </details>
            </div>
            <!-- **********************************************************DELETE************************************************************************* -->
            <div class="api-endpoint">
                <code>
                    <span class='r'> DELETE
                    </span> /alimentos/$id
                    <br>
                </code>
                <p>Eliminar el registro indicado con el id, además se borrará la imagen correspondiente del servidor</p>
                <details>
                    <summary>Ejemplo JSON respuesta</summary>
                    <pre class="json">   <code><span class='r'>DELETE</span> <?= $ruta = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']); ?>/alimentos/7</code><br><br><?= style_json($json8) ?></pre>
                </details>
            </div>
        </div>
    </div>


</body>

</html>