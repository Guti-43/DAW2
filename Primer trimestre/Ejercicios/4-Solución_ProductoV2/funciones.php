<?php
// Constantes deben estar en el ámbito global
// NO está permitido definir constantes dentro de una función

const DESCUENTO_PORCENTAJE = 10;
const RECARGO_PORCENTAJE = 15;
const MAX_TAMANYO = 3 * 1024 * 1024; // 3MB


// Función para calcular el precio final
function calcularPrecioFinal($precioBase, $cantidad, $opcion, $iva)
{
    $precioTotal = $precioBase * $cantidad;
    if ($opcion == "DESCUENTO") {
        $descuento = $precioTotal * (DESCUENTO_PORCENTAJE / 100);
        $precioTotal -= $descuento;
    } elseif ($opcion == "RECARGO") {
        $recargo = $precioTotal * (RECARGO_PORCENTAJE / 100);
        $precioTotal += $recargo;
    }

    $ivaMonto = $precioTotal * ($iva / 100);
    $precioTotal += $ivaMonto;

    return $precioTotal;
}

// Función para manejar la subida de imágenes

function manejarImagen($imagen, &$errores)
{

    $tiposMimePermitidos = array('image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/webp');
    $directorioSubida = 'imagenServidor/';
    $imagenEnviada = 'imagenServidor/default.png';
    $correcto = true;

    switch ($imagen['error']) {
        case UPLOAD_ERR_OK:

            $archivoTemporal = $imagen['tmp_name'];
            $tipoMime = mime_content_type($archivoTemporal);
            $tamaño = filesize($archivoTemporal);

            // Validar tipo MIME
            if (!in_array($tipoMime, $tiposMimePermitidos)) {
                $errores[] = "El archivo debe ser una imagen GIF, JPEG, PNG, BMP o WEBP.";
                $correcto = false;
            }

            // Validar tamaño del archivo
            if ($tamaño > MAX_TAMANYO) {
                $errores[] = "El archivo no debe superar los " . MAX_TAMANYO / 1024 / 1024 . " MB.";
                $correcto = false;
            }

            // Si todas las validaciones son correctas, mover el archivo
            if ($correcto) {
                $nombreArchivo = pathinfo($imagen['name'], PATHINFO_BASENAME);
                $archivoSubido = $directorioSubida . $nombreArchivo;

                //Utilizamos la @ para evitar que se muestre un warning si no se puede mover el archivo
                if (@move_uploaded_file($archivoTemporal, $archivoSubido)) {
                    $imagenEnviada = $archivoSubido;
                } else {
                    $errores[] = "Error al mover el archivo a su ubicación definitiva.";
                }
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
    return $imagenEnviada;
}

function validarCampos(&$nombreProducto, &$precioBase, &$cantidad, &$opcion, &$iva, &$errores)
{
    // Alternativa usando htmlspecialchars
    //$nombreProducto = htmlspecialchars($_POST['nombre_producto'], ENT_QUOTES, 'UTF-8');
    $nombreProducto = filter_input(INPUT_POST, 'nombre_producto', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //Utilizar funciones mb para trabajar con cadenas siempre que se utilice UTF-8
    if (mb_strlen($nombreProducto) < 1 || mb_strlen($nombreProducto, 'UTF-8') > 50) {
        $errores[] = "El nombre del producto entre 1 y 50 caracteres.";
        $nombreProducto = "";
    }

    $precioBase = filter_input(INPUT_POST, 'precio_base', FILTER_VALIDATE_FLOAT, array('options' => array('min_range' => 0, 'max_range' => 2000)));
    if ($precioBase === false) {
        $errores[] = "El precio base debe ser un número entero o decimal entre 1 y 2000.";
    }

    $cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 100)));
    if ($cantidad === false) {
        $errores[] = "La cantidad debe ser un número entero entre 1 y 100.";
    }

    $opcion = filter_input(INPUT_POST, 'opcion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!in_array($opcion, array("DESCUENTO", "RECARGO"))) {
        $errores[] = "La opción debe ser DESCUENTO o RECARGO.";
        $opcion = "ERROR"; //Valor por defecto
    }

    $iva = filter_input(INPUT_POST, 'iva', FILTER_VALIDATE_FLOAT, array('options' => array('min_range' => 0, 'max_range' => 100)));
    if ($iva === false) {
        $errores[] = "El IVA debe ser un número entero o decimal mayor que cero y menor que 100.";
    }
}
