<?php
const SIZE_MAXIMO = 2 * 1024 * 1024; // 2MB tamaño máximo de la imagen
class Actualizar
{
    private static $datosEnviar = [];

    public static function gestion()
    {
        // Obtener el ID del registro a actualizar desde PATH_INFO
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

        $id = intval($id);


        // Comprobar que el registro existe en la base de datos
        $registroAntiguo = AlimentosModelo::getAlimento($id);
        // var_dump($registroAntiguo);
        // exit;
        if (!$registroAntiguo) {
            self::$datosEnviar = ['error' => "El registro con ID $id no existe"];
            self::enviarRespuesta(404);
            return;
        }

        // Obtener los datos del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $data = self::limpiar($data);

        // Verificar si $data está vacío
        if (empty($data)) {
            self::$datosEnviar = ['error' => "No se proporcionaron datos para actualizar"];
            self::enviarRespuesta(400);
            return;
        }

        // Validar y actualizar los campos indicados
        $camposValidos = ['nombre', 'energia', 'proteina', 'hidratocarbono', 'fibra', 'grasatotal', 'imagen'];
        $camposActualizar = [];
        $campoValidoPresente = false;

        foreach ($data as $campo => $valor) {
            if (in_array($campo, $camposValidos)) {
                $campoValidoPresente = true;

                // Validar que los campos numéricos sean numéricos
                if (in_array($campo, ['energia', 'proteina', 'hidratocarbono', 'fibra', 'grasatotal']) && !is_numeric($valor)) {
                    self::$datosEnviar = ['error' => "El campo $campo debe ser numérico"];
                    self::enviarRespuesta(400);
                    return;
                }

                // Comprobar que el nuevo nombre no exista en la base de datos y que no sea el nombre del registro que se está actualizando
                if ($campo == 'nombre' && $valor != $registroAntiguo['nombre']) {
                    if (AlimentosModelo::existeNombre($valor)) {
                        self::$datosEnviar = ['error' => "El nombre del alimento ya existe"];
                        self::enviarRespuesta(400);
                        return;
                    }
                }
                $camposActualizar[$campo] = $valor;
            }
        }
        // Verificar que al menos un campo válido esté presente en los datos recibidos
        if (!$campoValidoPresente) {
            self::$datosEnviar = ['error' => "No se proporcionó ningún campo válido para actualizar"];
            self::enviarRespuesta(400);
            return;
        }
        // Validar y procesar la imagen
        if (isset($camposActualizar['imagen'])) {
            $error = self::validarYProcesarImagen($camposActualizar);
            if ($error) {
                self::$datosEnviar = ['error' => $error];
                self::enviarRespuesta(400);
                return;
            }
        }

        // Actualizar los campos en la base de datos
        AlimentosModelo::actualizarRegistro($id, $camposActualizar);

        self::$datosEnviar = ['mensaje' => "El registro con ID $id ha sido actualizado"];
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
}
