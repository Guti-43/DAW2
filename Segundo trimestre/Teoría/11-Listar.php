<?php
class Listar
{

    public function gestion()
    {
        // Obtener la ruta
        $pathInfo = $_SERVER['PATH_INFO'] ?? '/';

        // Variables a usar
        $idGrupo = isset($_GET['id']) ? (int)($_GET['id']) : null;
        $valor = "ejemplo";

        // Mapeo de rutas a métodos
        $rutas = [
            '/' => function () use ($idGrupo) {
                self::GruposConciertos($idGrupo);
            },
            '/entradas' => function () {
                self::listarEntradas();
            },
            '/grupos' => function () use ($valor) {
                $this->listarGrupos($valor); // Método dinámico
            },
        ];

        // Comprobar si la ruta existe y ejecutarla
        if (array_key_exists($pathInfo, $rutas)) {
            call_user_func($rutas[$pathInfo]); // Ejecuta la función correspondiente a la ruta
        } else {
            http_response_code(404);
        }
    }


    private static function GruposConciertos($idGrupo = null) {}
    public static function listarEntradas() {}
    public function listarGrupos($valor) {}





    // public static function gestion1()
    // {
    //     // Obtener la parte de la URL que sigue al nombre del script
    //     $pathInfo = $_SERVER['PATH_INFO'] ?? '';
    //     // Obtener el parámetro 'id' de la URL
    //     $idGrupo = isset($_GET['id']) ? (int)self::limpiar($_GET['id']) : null;

    //     // Usar un switch para gestionar las distintas rutas
    //     switch ($pathInfo) {
    //         case '':
    //         case '/':
    //             self::GruposConciertos($idGrupo);
    //             break;
    //         case '/entradas':
    //             self::listarEntradas();
    //             break;

    //         default:
    //             self::$datosConsulta = ["error" => "Ruta no encontrada"];
    //             $codigoEstado = 404;
    //             self::enviarRespuesta($codigoEstado);
    //             break;
    //     }
    // }
}
