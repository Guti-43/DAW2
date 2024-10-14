<?php
$ruta = 'misEjemplos';

// Nombre del archivo .rar
$rarArchivo = 'archivo.rar';

// Ruta completa al archivo
$rutaCompletaRar = $ruta . '/' . $rarArchivo;

// Verificamos si el archivo existe
if (file_exists($rutaCompletaRar)) {
    // Obtenemos el contenido del archivo y lo guardamos en una variable
    $contenidoFichero = file_get_contents($rutaCompletaRar);

    // Establecemos las cabeceras para indicar que es un archivo .rar
    header('Content-Type: application/x-rar-compressed'); // Tipo MIME para archivos .rar
    header('Content-Disposition: attachment; filename="' . pathinfo($rutaCompletaRar, PATHINFO_BASENAME) . '"');
    header('Content-Length: ' . filesize($rutaCompletaRar));

    // Enviamos el contenido del archivo al navegador. IMPORTANTE: No hacer echo de nada antes de esta línea
    // Si no se hace echo el fichero no se enviará al navegador
    echo $contenidoFichero;
    exit;
} else {
    echo "El archivo no existe.";
}


//Content-Disposition: attachment   
//Este encabezado le indica al navegador que el archivo debe ser tratado como un archivo adjunto y no como un archivo que se debe mostrar directamente en el navegador.


//Al usar attachment, el navegador forzará la descarga del archivo, en lugar de intentar abrirlo dentro de la ventana del navegador 

//filename
// Este parámetro define el nombre que el navegador debe sugerir para guardar el archivo cuando el usuario lo descarga. 
//Al incluir filename="nombre.extensión", le indicas al navegador cómo debe llamar al archivo descargado.
