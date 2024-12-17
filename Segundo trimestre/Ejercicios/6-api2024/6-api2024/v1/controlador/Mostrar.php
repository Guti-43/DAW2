<?php
class Mostrar
{
    public static function getRuta()
    {
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/imgs/';
    }
    public static function gestion()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            $inicio = isset($_GET['inicio']) ? $_GET['inicio'] : 0;
            $cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : PHP_INT_MAX;
            self::getAlimentos($inicio, $cantidad);
        } else {
            $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
            if (is_numeric($rutaPathSinBarra[1])) {  // Obtener un único registro
                self::getIdAlimento($rutaPathSinBarra[1]);
            }
            if (!is_numeric($rutaPathSinBarra[1])) {    // Obtener registros filtrados y ordenados  
                $orden = isset($_GET['ord']) && $_GET['ord'] == 'desc' ? 'desc' : 'asc';
                self::busqueda($rutaPathSinBarra[1], $orden);
            }
        }
    }

    public static function getAlimentos($inicio = 0, $cantidad = PHP_INT_MAX)
    {
        $datosConsulta = [];
        $datosConsulta = Alimentos::getTodos($inicio, $cantidad);
        if ($datosConsulta) {
            $datosConsulta = self::procesarImagenes($datosConsulta);
        }
        self::enviarRespuesta($datosConsulta);
    }
    public static function getIdAlimento($id)
    {
        $datosConsulta = [];
        $datosConsulta = Alimentos::getAlimento($id);
        if ($datosConsulta) {
            $datosConsulta = self::procesarImagenes($datosConsulta);
        }
        self::enviarRespuesta($datosConsulta);
    }
    public static function busqueda($nombre, $orden)
    {
        $datosConsulta = [];
        $datosConsulta = Alimentos::getBusqueda($nombre, $orden);
        if ($datosConsulta) {
            $datosConsulta = self::procesarImagenes($datosConsulta);
        }
        self::enviarRespuesta($datosConsulta);
    }
    private static function procesarImagenes($datosConsulta)
    {
        foreach ($datosConsulta as $indice => $contenido) {
            if ($datosConsulta[$indice]['imagen']) {
                $datosConsulta[$indice]['imagen'] = self::getRuta() . $contenido['imagen'];
            }
        }
        return $datosConsulta;
    }

    private static function enviarRespuesta($datosConsulta)
    {
        $codificado = json_encode(
            $datosConsulta,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
        if ($datosConsulta) {
            header("HTTP/1.1 200 OK");
        } else {
            header("HTTP/1.1 204 No Content");
        }
        echo $codificado;
    }
}
