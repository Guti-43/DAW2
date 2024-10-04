<?php
include 'funciones.php';

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    validarCampos($nombreProducto, $precioBase, $cantidad, $opcion, $iva, $errores);


    //Utilizar la entrada $_FILES['imagen_producto'] trabajamos con un array asociativo de un solo nivel
    $imagenSubida = manejarImagen($_FILES['imagen_producto'], $errores);

    $precioFinal = calcularPrecioFinal($precioBase, $cantidad, $opcion, $iva);


    // Mostrar resultado de los errores

    //$erroresMostrar = !empty($errores) ? implode('<br>', $errores) : '';
    $erroresMostrar = implode('<br>', $errores ?? []);

    // Mostrar formulario deben conservarse los valores válidos en los campos
    // y mostrar resultado con los errores y los campos válidos
    require_once 'index1.php';
    require_once 'resultado.php';
}
