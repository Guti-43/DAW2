<?php
class Mostrar
{
    private static $datosConsulta = [];

    public static function getRuta()
    {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 2) . '/imagenes/';
    }

    public static function gestion()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            $inicio = isset($_GET['inicio']) ? self::limpiar($_GET['inicio']) : 0;
            $cantidad = isset($_GET['cantidad']) ? self::limpiar($_GET['cantidad']) : PHP_INT_MAX;
            self::getAlimentos($inicio, $cantidad);
        } else {
            $rutaPathSinBarra = explode('/', trim($_SERVER['PATH_INFO'], '/'));
            $primerSegmento = isset($rutaPathSinBarra[0]) ? $rutaPathSinBarra[0] : null;

            switch (true) {
                case is_numeric($primerSegmento) && ($primerSegmento > 0):  // Obtener un único registro
                    self::getIdAlimento(intval($primerSegmento));
                    break;

                case !is_numeric($primerSegmento):  // Obtener registros filtrados y ordenados
                    self::limpiar($_GET);
                    $orden = isset($_GET['orden']) && mb_strtolower($_GET['orden']) == 'desc' ? 'desc' : 'asc';
                    self::busqueda($primerSegmento, $orden);
                    break;

                default:
                    self::$datosConsulta = ["error" => "Petición incorrecta"];
                    self::enviarRespuesta(400);
                    break;
            }
        }
    }
    public static function getAlimentos($inicio = 0, $cantidad = PHP_INT_MAX)
    {
        $codigoEstado = 200;

        // Obtener el número total de registros en la base de datos
        $totalRegistros = AlimentosModelo::getTotalRegistros();

        switch (true) {
            case (!is_numeric($inicio) || !is_numeric($cantidad)):
                $codigoEstado = 400;
                self::$datosConsulta = ["error" => "Los parámetros 'inicio' y 'cantidad' deben ser números."];
                break;
            case ($inicio < 0):
                $codigoEstado = 400;
                self::$datosConsulta = ["error" => "El parámetro 'inicio' debe ser mayor o igual que cero."];
                break;

            case ($cantidad <= 0):
                $codigoEstado = 400;
                self::$datosConsulta = ["error" => "El parámetro 'cantidad' debe ser mayor que cero."];
                break;

            case ($inicio > $totalRegistros):
                $codigoEstado = 400;
                self::$datosConsulta = ["error" => "El parámetro 'inicio' no puede ser mayor que el número total de registros($totalRegistros)."];
                break;

            default:
                self::$datosConsulta = AlimentosModelo::getTodos($inicio, $cantidad);
                if (self::$datosConsulta) {
                    self::procesarImagenes();
                }
                break;
        }
        self::enviarRespuesta($codigoEstado);
    }
    public static function getIdAlimento($id)
    {

        self::$datosConsulta = AlimentosModelo::getAlimento(self::limpiar($id));
        if (self::$datosConsulta) {
            self::procesarImagenes();
        }
        self::enviarRespuesta(200);
    }

    public static function busqueda($nombre, $orden)
    {

        self::$datosConsulta = AlimentosModelo::getBusqueda($nombre, $orden);
        if (self::$datosConsulta) {
            self::procesarImagenes();
        }
        self::enviarRespuesta(200);
    }

    private static function procesarImagenes()
    {
        foreach (self::$datosConsulta as $indice => $contenido) {
            if (!empty($contenido['imagen'])) {
                self::$datosConsulta[$indice]['imagen'] = self::getRuta() . $contenido['imagen'];
            }
        }
    }
    private static function enviarRespuesta($codigoEstado = 200)
    {
        $codificado = json_encode(
            self::$datosConsulta,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
        http_response_code($codigoEstado);
        if ($codigoEstado === 200 && empty(self::$datosConsulta)) {
            http_response_code(204);
        }
        echo $codificado;
    }
    protected static function limpiar($input)
    {
        return is_array($input)
            ? array_map([static::class, 'limpiar'], $input)
            : (htmlspecialchars(trim(strip_tags($input))) ?? null);
    }
}
