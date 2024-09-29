<?php
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombre'] ?? '';
        $fecha = $_POST['fecha'] ?? '';
        $ubicacion = $_POST['ubicacion'] ?? '';
        $deportes = $_POST['deportes'] ?? [];

        if (empty($nombre)) {
            $errores[] = "El nombre del evento es obligatorio.";
        }
        
        if (empty($fecha)) {
            $errores[] = "La fecha del evento es obligatoria.";
        }
        
        if (empty($ubicacion)) {
            $errores[] = "La ubicación del evento es obligatoria.";
        }

        if (empty($deportes)) {
            $errores[] = "Debe seleccionar al menos un deporte.";
        }

        if(empty($errores)){
            include('index1.php');
            include('ficha.php');
            $errores = [];
        }else{
            include('index1.php');
        }
    }




?>

