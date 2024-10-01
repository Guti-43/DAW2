<?php
const MAX_TAMANYO = 2097152; // 2MB en bytes
$errores = [];
$erroresMostrar = '';
$tiposMimePermitidos = ['image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/webp'];

// Validar nombre del evento
if (empty($_POST['nombre'])) {
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

// Validar archivo
if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] != UPLOAD_ERR_OK) {
    $errores[] = "Debe seleccionar un archivo.";
} else {
    $archivoTemporal = $_FILES['archivo']['tmp_name'];
    $tipoMime = mime_content_type($archivoTemporal);
    $tamaño = filesize($archivoTemporal);
    if (!in_array($tipoMime, $tiposMimePermitidos)) {
        $errores[] = "El archivo debe ser una imagen GIF, JPEG, PNG, BMP o WEBP.";
    }
    if ($tamaño > MAX_TAMANYO) {
        $errores[] = "El archivo no debe superar los 2MB.";
    }
}


// Si hay errores volcar el array en una cadena con un salto de línea
if (!empty($errores)) {
    foreach ($errores as $error) {
        $erroresMostrar .= $error . '<br>';
    }
}
// Si hay errores volcar el array en una cadena con un salto de línea
if (!empty($errores)) {
    $erroresMostrar = implode('<br>', $errores);
}

include('index1.php');

if (empty($errores)) {
    // Evitar ataques XSS
    
    //<a href='https://www.elmundo.es/'>Haz clic aquí</a>
    //<script>alert("Esto es un ataque XSS")</script>    
    //<script>window.location.href= 'https: //www.elmundo.es/';</script>

    // Sanitizar los datos
    // $nombre_evento = htmlspecialchars($_POST['nombre_evento'], ENT_QUOTES, 'UTF-8');
    // $ubicacion = htmlspecialchars($_POST['ubicacion'], ENT_QUOTES, 'UTF-8');

    $fecha = htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8');
    $deportes = $_POST['deportes'];
    $nombre_evento = $_POST['archivo'];
    $ubicacion = $_POST['ubicacion'];

    // Procesar el archivo
    $nombreArchivo = $_FILES['archivo']['name'];
    $rutaArchivo = 'imagenes/' . $nombreArchivo;

    move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo);
    include('ficha1.php');
}
