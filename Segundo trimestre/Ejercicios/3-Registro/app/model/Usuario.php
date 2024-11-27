<?php
class Usuario
{
    private $conexion;
    private static $instancia;
    private $cursor;

    private function __construct()
    {
        $this->conectar();
    }

    public static function obtenerInstancia()
    {
        return self::$instancia ?? (self::$instancia = new self());
    }

    private function conectar()
    {
        $dsn = "mysql:host=" . Config::HOST . ";dbname=" . Config::DATABASE . ";port=" . Config::PORT . ";charset=" . Config::CHARSET;
        try {
            $this->conexion = new PDO($dsn, Config::USERNAME, Config::PASSWORD);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public function obtenerConexion()
    {
        return $this->conexion;
    }




    private static function manejarError($e)
    {
        file_exists(Config::LOGFILE) ? unlink(Config::LOGFILE) : null;
        $separador = str_repeat("=", 100) . "\n\n";
        $detallesError = sprintf(
            "%sError: %s\n\nFichero: %s\n\nLinea: %d\n\n%sTrace:\n\n%s",
            $separador,
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $separador,
            print_r($e->getTrace(), true)
        );
        error_log($detallesError, 3, Config::LOGFILE);
        ob_clean();
        include 'app/view/errorBD.php';
        exit();
    }

    public function __destruct()
    {
        isset($this->cursor) ? $this->cursor->closeCursor() : null;
        $this->conexion = null;
    }
}
