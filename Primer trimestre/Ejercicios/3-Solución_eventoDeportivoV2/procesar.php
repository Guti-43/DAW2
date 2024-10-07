<?php
const MAX_TAMANYO = 2097152; // 2MB en bytes
$errores = [];
$erroresMostrar = '';
$tiposMimePermitidos = ['image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/webp'];

// Validar nombre del evento
if (empty($_POST['nombre_evento'])) {
    $errores[] = "El nombre del evento es obligatorio.";
}

// Validar fecha
if (empty($_POST['fecha'])) {
    $errores[] = "La fecha es obligatoria.";
}

// Validar ubicación
if (empty($_POST['ubicacion'])) {
    $errores[] = "La ubicación es obligatoria.";
}

// Validar deportes
if (!isset($_POST['deportes']) || empty($_POST['deportes'])) {
    $errores[] = "Debe seleccionar al menos un deporte.";
}

// Validar archivo utilizando el código de error de $_FILES
switch ($_FILES['nombreCampo']['error']) {
    case UPLOAD_ERR_OK:
        $archivoTemporal = $_FILES['nombreCampo']['tmp_name'];
        // Obtener el tipo MIME y el tamaño del archivo desde el archivo temporal
        $tipoMime = mime_content_type($archivoTemporal);
        $tamaño = filesize($archivoTemporal);

        if (!in_array($tipoMime, $tiposMimePermitidos)) {
            $errores[] = "El archivo debe ser una imagen GIF, JPEG, PNG, BMP o WEBP.";
        }
        if ($tamaño > MAX_TAMANYO) {
            $errores[] = "El archivo no debe superar los 2MB.";
        }
        break;

    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
        $errores[] = "El archivo excede el tamaño máximo permitido.";
        break;

    case UPLOAD_ERR_PARTIAL:
        $errores[] = "El archivo se subió parcialmente.";
        break;

    case UPLOAD_ERR_NO_FILE:
        $errores[] = "Debe seleccionar un archivo.";
        break;

    case UPLOAD_ERR_NO_TMP_DIR:
        $errores[] = "Falta la carpeta temporal.";
        break;

    case UPLOAD_ERR_CANT_WRITE:
        $errores[] = "No se pudo escribir el archivo en el disco.";
        break;

    case UPLOAD_ERR_EXTENSION:
        $errores[] = "Una extensión de PHP detuvo la subida del archivo.";
        break;
}

if (empty($errores)) {
    //Procesar el archivo
    //Elegir el nombre del archivo y su ubicación
    $nombreArchivo = $_FILES['nombreCampo']['name'];
    $rutaArchivo = 'imagenes/' . $nombreArchivo;

    // Mover el archivo a su ubicación definitiva
    // Utilizar @ para suprimir el mensaje de error de PHP
    if (@!move_uploaded_file($_FILES['nombreCampo']['tmp_name'], $rutaArchivo))
        $errores[] = "Error al mover el archivo a su ubicación definitiva.";
}


// Si hay errores volcar el array en una cadena con un salto de línea
if (!empty($errores)) {
    foreach ($errores as $error) {
        $erroresMostrar .= $error . '<br>';
    }
}
// Hacer lo mismo con empty(): si hay errores volcar el array en una cadena con un salto de línea
if (!empty($errores)) {
    $erroresMostrar = implode('<br>', $errores);
}

include('index.php');

if (empty($errores)) {
    //Evitar ataques XSS

    //Ejemplos de ataques XSS:
    //<a href='https://www.elmundo.es/'>Haz clic aquí</a>
    //<script>alert("Esto es un ataque XSS")</script>    
    //<script>window.location.href='https://www.elmundo.es/';</script>


    $ubicacion = htmlspecialchars($_POST['ubicacion'], ENT_QUOTES, 'UTF-8');
    $fecha = htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8');
    $deportes = $_POST['deportes'];

    //El campo nombre_evento no está saneado para probar los ataques XSS
    $nombre_evento = $_POST['nombre_evento'];

    // Sanear el campo nombre_evento
    // $nombre_evento = htmlspecialchars($_POST['nombre_evento'], ENT_QUOTES, 'UTF-8');


    include('ficha.php');
}
