<?php
class Base
{
    public static function manejadorErrorGlobal()
    {
        // La función set_exception_handler()  se utiliza para establecer una función de manejo de excepciones personalizada. Esta función se invoca automáticamente cuando se lanza una excepción no capturada en el script. 
        // Es una forma de centralizar el manejo de excepciones y de asegurarse de que todas las excepciones no capturadas se manejen de manera deseada.
        // Debe ser llamada en el script principal antes de que se lance cualquier excepción.
        // En nuestro caso en el archivo alimentos.php

        set_exception_handler(
            function ($exception) {
                // Enviar el manejo de errores y excepciones al método manejarError de esta clase
                self::manejarError($exception);
            }
        );
    }

    /* Manejador de errores global */
    private static function manejarError($e)
    {
        file_exists(Config::getFilePath()) ? unlink(Config::getFilePath()) : null;
        $separador = str_repeat("=", 100) . "\n\n";
        $detallesError = sprintf(
            "%sError: %s\n\nFichero: %s\n\nLinea: %d\n\n%sTrace:\n\n%s",
            $separador,
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $separador,
            print_r($e->getTrace(), true)
        );
        error_log($detallesError, 3, Config::getFilePath());

        // Enviar respuesta al navegador cuando estemos en desarrollo
        // Comentar estas tres líneas en producción. El cliente no debe recibir detalles del error
        ob_clean();
        header('Content-Type: text/html; charset=UTF-8');
        include 'vistas/errorBD.php';


        // Enviar solamente esta respuesta al cliente cuando estemos en producción 
        http_response_code(500);
        echo json_encode([
            'error' => true,
            'mensaje' => 'Ocurrió un error en el servidor. Por favor, inténtelo más tarde.'
        ],  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit();
    }
}
