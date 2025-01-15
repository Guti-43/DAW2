<?php
class Config
{
    public static $rutaImagenes = '../imagenes/';
    //Devuelve el valor de una variable de entorno
    public static function get($key)
    {
        return $_ENV[$key] ?? null;
    }

    //Devuelve la URL del archivo de log, para ser mostrado en el navegador y crear un enlace
    public static function getUrl()
    {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 2) . '/logs/' . self::get('LOGFILE');
    }

    //Devuelve la ruta completa del archivo de log, ruta física relativa para en el archivo de log
    public static function getFilePath()
    {
        return __DIR__ . '/../logs/' . self::get('LOGFILE');
    }
}
