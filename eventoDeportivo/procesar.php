
<?php
var_dump($_FILES);
$errores = [];
$erroresMostrar = '';
$extensiones = ['image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/webp'];

if (empty($_POST['nombre'])) {
    $errores[] = "el nombre esta vacio";
}

if (empty($_POST['fecha'])) {
    $errores[] = "la fecha esta vacia";
}

if (empty($_POST['ubicacion'])) {
    $errores[] = "la ubicacion esta vacia";
}

if (!isset($_POST['deportes']) || empty($_POST['deportes'])) {
    $errores[] = "los deportes estan vacios";
}

if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] != UPLOAD_ERR_OK) {
    $errores[] = "sube un archivo";
} else {
    $nombre_temporal = $_FILES['archivo']['tmp_name'];
    $tipo = mime_content_type($nombre_temporal);
    $tamaño = filesize($nombre_temporal);
    if (!in_array($tipo, $extensiones)) {
        $errores[] = "El archivo debe ser una imagen GIF, JPEG, PNG, BMP o WEBP.";
    }
    if ($tamaño > 209715) {
        $errores[] = "el tamaño es superior al permitido";
    }
}

if (!empty($errores)) {
    foreach ($errores as $error) {
        $erroresMostrar .= $error . '<br>';
    }
}

include('index1.php');

if (empty($errores)) {
    $nombre = $_POST['nombre'];
    $fecha = htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8');
    $ubicacion = $_POST['ubicacion'];
    $deportes = $_POST['deportes'];


    $archivo = $_FILES['archivo']['name'];
    $rutaArchivo='images/' . $nombre_archivo;

    move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo);
    include('ficha.php');
}
?>