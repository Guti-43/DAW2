<?php
const SIZE_MAXIMO = 2 * 1024 * 1024; // 2MB tamaño máximo de la imagen
class Insertar
{
    private static $datosEnviar = [];

    public static function gestion()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $data = self::limpiar($data);

        // Validar que todos los campos estén presentes
        $camposRequeridos = ['nombre', 'energia', 'proteina', 'hidratocarbono', 'fibra', 'grasatotal', 'imagen'];
        foreach ($camposRequeridos as $campo) {
            if (!isset($data[$campo])) {
                self::$datosEnviar = ['error' => "El campo $campo es requerido"];
                self::enviarRespuesta(400);
                return;
            }
        }
        // Validar que los campos numéricos sean numéricos
        $camposNumericos = ['energia', 'proteina', 'hidratocarbono', 'fibra', 'grasatotal'];
        foreach ($camposNumericos as $campo) {
            if (!is_numeric($data[$campo])) {
                self::$datosEnviar = ['error' => "El campo $campo debe ser numérico"];
                self::enviarRespuesta(400);
                return;
            }
        }
        // Verificar que el nombre del alimento no exista en la base de datos
        if (AlimentosModelo::existeNombre($data['nombre'])) {
            self::$datosEnviar = ['error' => "El nombre del alimento ya existe"];
            self::enviarRespuesta(400);
            return;
        }
        // Validar y procesar la imagen
        $error = self::validarYProcesarImagen($data);
        if ($error) {
            self::$datosEnviar = ['error' => $error];
            self::enviarRespuesta(400);
            return;
        }

        // Insertar los datos en la base de datos
        $idNuevoRegistro = AlimentosModelo::insertarRegistro($data);
        self::$datosEnviar = ['idNuevoRegistro' => $idNuevoRegistro];
        self::enviarRespuesta(201);
    }


    private static function validarYProcesarImagen(&$data)
    {
        $error = null;

        // Validar que la imagen esté en base64
        if (!preg_match('/^data:image\/\w+;base64,/', $data['imagen'])) {
            $error = "La imagen debe estar en formato base64";
        }

        // Obtener el tipo MIME y dividirlo en un array
        if (!$error) {
            $mime = explode('/', @mime_content_type($data['imagen']));
            if ($mime[0] !== 'image') {
                $error = "La imagen debe ser un archivo de imagen";
            } elseif (!in_array($mime[1], ['jpeg', 'jpg', 'png', 'gif', 'webp', 'bmp', 'svg'], true)) {
                $error = "La imagen debe ser un archivo con tipo jpeg, jpg, png, gif, webp, bmp o svg";
            }
        }

        // Decodificar la imagen base64 y obtener el tamaño del archivo en bytes
        if (!$error) {
            $original = explode(',', $data['imagen']);
            $original = base64_decode($original[1]); // Obtenemos la imagen original decodificada para guardarla en el servidor
            $originalSize = strlen($original); // Tamaño del archivo decodificado en bytes

            // Verificar que el tamaño del archivo sea menor de 2MB
            if ($originalSize > SIZE_MAXIMO) {
                $error = "La imagen debe ser menor de 2MB";
            }
        }

        // Guardar la imagen solo si no hay errores
        if (!$error) {
            $nombreArchivo = self::limpiarCaracteresNombreArchivo($data['nombre']);
            $data['imagen'] = $nombreArchivo . '.' . $mime[1];
            // var_dump($data);
            $rutaYnombre = Config::$rutaImagenes .   $nombreArchivo . '.' . $mime[1];
            file_put_contents($rutaYnombre, $original);
        }
        return $error;
    }
    private static function limpiarCaracteresNombreArchivo($nombre)
    {
        // Reemplazar espacios por guiones bajos
        $nombre = str_replace(' ', '_', $nombre);
        // Eliminar caracteres no válidos para nombres de archivo
        $nombre = preg_replace('/[^A-Za-z0-9_\-]/', '', $nombre);
        return $nombre;
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
