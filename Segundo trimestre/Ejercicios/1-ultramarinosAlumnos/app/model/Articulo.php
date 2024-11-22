<?php
class Articulo
{
    private $conexion;
    private static $instancia;
    private $cursor;

    private $nombre;
    private $precio;
    private $cantidad;
    private $imagen;

    public const ARTICULOS_POR_PAGINA = 3;

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

    public function obtenerTodosArticulos()
    {
        try {
            $this->cursor = $this->conexion->prepare("SELECT * FROM articulos");
            $this->cursor->execute();
            return $this->cursor->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    
    
    public function obtenerArticulosPaginados()
    {
        //Obtener el número de filas a omitir porque ya se han mostrado en páginas anteriores        
        $offset = NULL; // Realizar este cálculo


        // LIMIT Limita el número de filas devueltas por la consulta.
        // OFFSET  Establece el número de filas a omitir antes de comenzar a devolver las filas.

        // LIMIT y OFFSET deben ser números enteros positivos. Un negativo generará un error.

        // OFFSET 0 comenzará desde la primera fila.
        // OFFSET 1 omitirá la primera fila y comenzará desde la segunda fila.
        // OFFSET 2 omitirá las dos primeras filas y comenzará desde la tercera fila.            
        // LIMIT 5 OFFSET 0 devolverá las primeras 5 filas.

        // Si OFFSET es mayor que el número de filas, no se devolverán filas. Pero no generará un error.

        $sql = "SELECT * FROM articulos LIMIT :limit OFFSET :offset";
    }

    // Contar el total de artículos
    public function contarArticulos()
    {
        // Realizar este método
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
