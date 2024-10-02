<?php
// Funciones  
require_once 'funciones.php';


// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validarCampos();
    calcularPrecioFinal();
    manejarImagen();

    // Mostrar formulario: deben conservarse los valores válidos en los campos
    // y mostrar resultado con los errores y los campos válidos
    require_once 'index.php';
    require_once 'resultado.php';
}
