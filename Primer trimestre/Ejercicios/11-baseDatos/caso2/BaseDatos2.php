<?php
require_once 'config.php';

class BaseDatos2
{
    private $conexion;
    private static $instancia; // Almacena la instancia única de la clase.
    private $cursor;

    private function __construct() // Constructor privado para evitar que se pueda instanciar la clase.
    {
        $this->conectar();
    }

    public static function obtenerInstancia() // Método estático para obtener una instancia de la clase.
    {
        if (self::$instancia === null) {
            self::$instancia = new self(); // equivalente a new BaseDeDatos()
        }
        return self::$instancia;
    }

    private function conectar()
    {
        $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE . ";port=" . PORT . ";charset=" . CHARSET;
        try {
            $this->conexion = new PDO($dsn, USERNAME, PASSWORD);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public function obtenerConexion()
    {
        return $this->conexion;
    }
    /**
     * Prepara y vincula los parámetros a la sentencia preparada
     *
     * @param [type] $sentenciaPreparada Sentencia preparada
     * @param [type] $params Array asociativo con los parámetros a vincular
     * @return void
     */
    private function vincularParametros($sentenciaPreparada, $params)
    {
        foreach ($params as $param => $contenido) {
            if (is_array($contenido)) {
                $tipo = $contenido['tipo'] ?? $this->obtenerTipoPDO($contenido['valor']);
                $longitud = $contenido['longitud'] ?? null;
                $sentenciaPreparada->bindParam($param, $contenido['valor'], $tipo, $longitud);
            } else {
                $tipo = $this->obtenerTipoPDO($contenido);
                $sentenciaPreparada->bindParam($param, $contenido, $tipo);
            }
        }
    }

    private function obtenerTipoPDO($contenido)
    {
        switch (true) {
            case is_int($contenido):
                return PDO::PARAM_INT;
            case is_bool($contenido):
                return PDO::PARAM_BOOL;
            case is_null($contenido):
                return PDO::PARAM_NULL;
            default:
                return PDO::PARAM_STR;
        }
    }
    public function seleccionar($sql, $params = [], $fetchMode = PDO::FETCH_ASSOC)
    {
        try {
            $sentenciaP = $this->conexion->prepare($sql);
            $this->vincularParametros($sentenciaP, $params);
            $sentenciaP->execute();
            return $sentenciaP->fetchAll($fetchMode);
        } catch (PDOException $e) {
            $this->manejarError($e);
            return [];
        }
    }


    public function insertar($sql, $params = [])
    {
        if ($this->ejecutar($sql, $params)) {
            return $this->conexion->lastInsertId();
        }
        return false;
    }

    public function actualizar($sql, $params = [])
    {
        return $this->ejecutar($sql, $params);
    }

    public function eliminar($sql, $params = [])
    {
        return $this->ejecutar($sql, $params);
    }

    private function ejecutar($sql, $params = [])
    {
        try {
            $this->cursor = $this->conexion->prepare($sql);
            $this->vincularParametros($this->cursor, $params);
            return $this->cursor->execute();
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    private function manejarError($e)
    {
        file_exists(LOGFILE) ? unlink(LOGFILE) : null;
        $detallesError = "Error: " . $e->getMessage() . "\n" . "Trace:\n " . print_r($e->getTrace(), true) . "\n";
        error_log($detallesError, 3, LOGFILE);
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/' . LOGFILE;
        exit("<div class='errorExit'> Se ha producido un error. Consulta el <a href='$url' target='_blank'>archivo de log</a> para más información.</div>");
    }

    public function __destruct()
    {
        isset($this->cursor) ? $this->cursor->closeCursor() : null;
        $this->conexion = null;
    }
}
