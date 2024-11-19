<?php
class Config
{
    const HOST = 'localhost';
    const DATABASE  = 'intercambio';
    const USERNAME = 'root';
    const PASSWORD = '';
    const CHARSET = 'utf8mb4';
    const PORT = '3306';

    const LOGFILE = 'miFicheroErrores.log';

    static public $estilo = 'assets/css/intercambio.css';
    static public $rutaImg = 'assets/img/';
    static public $rutaAvatar = 'uploads/img/avatar/';
    static public $rutaArticulo = 'uploads/img/articulo/';


    private static $url = NULL;
    public static function getUrl()
    {
        return  self::$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/' . self::LOGFILE;
    }
}
