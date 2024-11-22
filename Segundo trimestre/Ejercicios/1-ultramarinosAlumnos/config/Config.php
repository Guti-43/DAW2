<?php
class Config
{
    const HOST = 'localhost';
    const DATABASE  = 'ultramarinos';
    const USERNAME = 'root';
    const PASSWORD = '';
    const CHARSET = 'utf8mb4';
    const PORT = '3306';

    const LOGFILE = 'miFicheroErrores.log';

    static public $estilo = 'assets/css/ultramarino.css';
    static public $rutaArticulo = 'imagenes/productos/';



    private static $url = NULL;
    public static function getUrl()
    {
        return  self::$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/' . self::LOGFILE;
    }
}
