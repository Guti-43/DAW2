<?php
require_once 'config.php';

class BaseDatos
{
    private $conexion;
    private static $instancia; //Almacena la instancia única de la clase. 
    private $cursor;

    private function __construct() //Constructor privado para evitar que se pueda instanciar la clase.
    {
        $this->conectar();
    }

    public static function obtenerInstancia() //Método estático para obtener una instancia de la clase
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

    public function seleccionar($sql, $params = [])
    {
        try {
            $this->cursor = $this->conexion->prepare($sql);
            $this->cursor->execute($params);
            return $this->cursor->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->manejarError($e);
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
            return $this->cursor->execute($params);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    private function manejarError($e)
    {
        file_exists(LOGFILE) ? unlink(LOGFILE) : null;
        $detallesError = "Error: " . $e->getMessage() . "\n" . "Trace:\n " . print_r($e->getTrace(), true) . "\n";
        error_log($detallesError, 3, LOGFILE);
        exit("<div class='errorExit'> Se ha producido un error.<br> Consulta el archivo de log para más información.</div>");
    }
    //Este método se llama automáticamente por PHP(método mágico) cuando el objeto es destruido.
    //Evita tener que cerrar explícitamente el cursor y la conexión.
    //Podemos eliminar finally de los métodos.
    public function __destruct()
    {
        isset($this->cursor) ? $this->cursor->closeCursor() : null;
        $this->conexion = null;
    }
}
