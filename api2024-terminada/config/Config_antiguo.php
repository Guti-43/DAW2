<?php
class Config
{
    const HOST = 'localhost'; //servidor de la base de datos
    const DATABASE = 'alimentos2024';
    const USERNAME = 'root';
    const PASSWORD = '';
    const PORT = '3306'; //puerto en el que escucha MariaDB o MySQL
    const CHARSET = 'utf8mb4';

    const LOGFILE = 'miFicheroErrores.log';

    private static $url = NULL;
    public static function getUrl()
    {
        return self::$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/' . self::LOGFILE;
    }
}
