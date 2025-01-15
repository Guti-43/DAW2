<?php

class Borrar
{
    private static $datosEnviar = [];

    public static function gestion()
    {
        // Obtener el ID del elemento a borrar desde PATH_INFO
        if (!isset($_SERVER['PATH_INFO'])) {
            self::$datosEnviar = ['error' => "No se proporcionó un ID"];
            self::enviarRespuesta(400);
            return;
        }

        $pathInfo = explode('/', trim($_SERVER['PATH_INFO'], '/'));
        $id = self::limpiar($pathInfo[0]);

        // Validar que el ID sea un número entero
        if (!is_numeric($id) || intval($id) != $id) {
            self::$datosEnviar = ['error' => "El ID debe ser un número entero"];
            self::enviarRespuesta(400);
            return;
        }

        $id = intval($id); // Convertir el ID a entero

        // Comprobar que el elemento existe en la base de datos           
        $registro = AlimentosModelo::buscarRegistro($id);
        if (!$registro) {
            self::$datosEnviar = ['error' => "El elemento con ID $id no existe"];
            self::enviarRespuesta(404);
            return;
        }

        // Obtener el nombre de la imagen del registro
        $nombreImagen = $registro['imagen'];

        // Eliminar el registro de la base de datos
        AlimentosModelo::borrarRegistro($id);

        // Eliminar la imagen de la carpeta de imágenes
        $rutaImagen = Config::$rutaImagenes . $nombreImagen;
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }

        //self::$datosEnviar = ['mensaje' => "El elemento con ID $id ha sido eliminado de la BD y la imagen ha sido borrada"];
        self::$datosEnviar = [
            'codigo' => 'OK',
            'mensaje' => "El registro ha sido eliminado de la BD y la imagen borrada del servidor.",
            'datos' => [
                'id' => $id,
                'nombre' => $nombreImagen
            ]
        ];
        self::enviarRespuesta(200);
    }

    private static function enviarRespuesta($codigoEstado = 200)
    {
        $codificado = json_encode(
            self::$datosEnviar,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
        http_response_code($codigoEstado);
        echo $codificado;
    }

    protected static function limpiar($input)
    {
        return is_array($input)
            ? array_map([static::class, 'limpiar'], $input)
            : (htmlspecialchars(trim(strip_tags($input))) ?? null);
    }
}
