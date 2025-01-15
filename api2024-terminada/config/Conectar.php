<?php
class Conectar
{
    public static function conexion()
    {
        $host = Config::get('HOST');
        $database = Config::get('DATABASE');
        $username = Config::get('USERNAME');
        $password = Config::get('PASSWORD');
        $port = Config::get('PORT');
        $charset = Config::get('CHARSET');


        $dsn = "mysql:host=$host;dbname=$database;port=$port;charset=$charset";
        $conexion = new PDO($dsn, $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }
}
