<?php
class Articulo
{
    private $conexion;
    private static $instancia;
    private $cursor;
    private $datos; // Datos para realizar el intercambio

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

    public function obtenerArticulos($idusuario)
    {
        try {
            $this->cursor = $this->conexion->prepare("SELECT * FROM articulos WHERE id_usuario = :id_usuario");
            $this->cursor->execute([':id_usuario' => $idusuario]);
            return $this->cursor->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public function obtenerIntercambio($idusuario)
    {
        try {
            $this->cursor = $this->conexion->prepare("SELECT * FROM articulos WHERE id_usuario <> :id_usuario AND disponible = 1");
            $this->cursor->execute([':id_usuario' => $idusuario]);
            return $this->cursor->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public function obtenerArticulosDisponibles($idusuario)
    {
        try {
            $this->cursor = $this->conexion->prepare("SELECT * FROM articulos WHERE id_usuario = :id_usuario AND disponible = 1");
            $this->cursor->execute([':id_usuario' => $idusuario]);
            return $this->cursor->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public function obtenerUnArticulo($id)
    {
        try {
            $this->cursor = $this->conexion->prepare("SELECT * FROM articulos WHERE id = :id");
            $this->cursor->execute([':id' => $id]);
            return $this->cursor->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public function actualizarArticulo($idArticulo, $disponible, $puntos)
    {
        try {
            if (!$this->obtenerUnArticulo($idArticulo)) {
                $mensaje = "El artículo no existe.";
            } else {
                $this->cursor = $this->conexion->prepare("UPDATE articulos SET disponible = :disponible, puntos = :puntos WHERE id = :id");
                $mensaje = $this->cursor->execute([
                    ':disponible' => $disponible,
                    ':puntos' => $puntos,
                    ':id' => $idArticulo
                ]);
            }
            return $mensaje;
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public function verificarIntercambio($idIntercambio, $idArticulo)
    {
        $error = null;
        $articuloIntercambio = $this->obtenerUnArticulo($idIntercambio);
        $articuloUsuario = $this->obtenerUnArticulo($idArticulo);

        // Comprobaciones adicionales
        if ($articuloIntercambio === false || $articuloUsuario === false) {
            $error = "No se encontraron los detalles para uno de los artículos.";
        } elseif ($articuloIntercambio['id_usuario'] == $articuloUsuario['id_usuario']) {
            $error = "No puedes intercambiar artículos contigo mismo.";
        } elseif ($articuloIntercambio['disponible'] == 0 || $articuloUsuario['disponible'] == 0) {
            $error = "Uno de los artículos no está disponible para intercambio.";
        } elseif ($articuloIntercambio['puntos'] > $articuloUsuario['puntos']) {
            $error = "Ese artículo no tiene puntos suficientes para realizar el trueque.";
        } else {
            // Preparo el array para el intercambio y guardar información en las dos tablas de la base de datos
            $this->datos = [
                'id_usuario' => $_SESSION['idusuario'],
                'id_articulo' => (int) $idArticulo,
                'id_articulo_intercambio' => (int) $idIntercambio,
                'id_usuario_intercambio' => (int) $articuloIntercambio['id_usuario']
            ];
        }
        return $error;
    }


    //Realizar intercambio una vez comprobado que los puntos son suficientes
    //que el artículo no es del mismo usuario y que ambos estan disponibles

    public function operacionIntercambiar($idIntercambio, $idArticulo)
    {
        try {
            //$this->conexion->beginTransaction();         
            $error = $this->verificarIntercambio($idIntercambio, $idArticulo);

            if ($error === null) {
                $this->conexion->beginTransaction();
                $datos = $this->datos;

                // Intercambiar los id_usuario de los artículos
                $this->cursor = $this->conexion->prepare("UPDATE articulos SET id_usuario = :id_usuario, disponible = 0 WHERE id = :id");
                // Intercambiar los id_usuario de los artículos
                $this->cursor->execute([
                    ':id_usuario' => $datos['id_usuario_intercambio'],
                    ':id' => $datos['id_articulo']
                ]);

                $this->cursor->execute([
                    ':id_usuario' => $datos['id_usuario'],
                    ':id' => $datos['id_articulo_intercambio']
                ]);

                // Insertar entrada en la tabla intercambios
                $this->cursor = $this->conexion->prepare("INSERT INTO intercambios (id_usuario_ofrece, id_usuario_recibe, id_articulo_ofrecido, id_articulo_recibido) VALUES (:id_usuario_ofrece, :id_usuario_recibe, :id_articulo_ofrecido, :id_articulo_recibido)");
                $this->cursor->execute([
                    ':id_usuario_ofrece' => $datos['id_usuario'],
                    ':id_usuario_recibe' => $datos['id_usuario_intercambio'],
                    ':id_articulo_ofrecido' => $datos['id_articulo'],
                    ':id_articulo_recibido' => $datos['id_articulo_intercambio']
                ]);
                // Obtener el id del intercambio recién insertado
                $idIntercambio = $this->conexion->lastInsertId();

                $this->crearMensajesIntercambio($idIntercambio);
                $this->conexion->commit();
                $error = true;
            }
            return $error;
        } catch (PDOException $e) {
            $this->conexion->rollBack();
            $this->manejarError($e);
        } finally {
            if ($this->conexion->inTransaction()) {
                $this->conexion->rollBack();
            }
        }
    }

    public function crearMensajesIntercambio($idIntercambio)
    {
        $datos = $this->datos;
        try {
            // Preparar la instrucción SQL para insertar mensajes
            $this->cursor = $this->conexion->prepare("INSERT INTO mensajes (id_intercambio, id_usuario, tipo_mensaje) VALUES (:id_intercambio, :id_usuario, :tipo_mensaje)");

            // Insertar mensaje para el usuario que ofrece el intercambio
            $this->cursor->execute([
                ':id_intercambio' => $idIntercambio,
                ':id_usuario' => $datos['id_usuario'],
                ':tipo_mensaje' => 'ofrece'
            ]);

            // Insertar mensaje para el usuario que recibe el intercambio
            $this->cursor->execute([
                ':id_intercambio' => $idIntercambio,
                ':id_usuario' => $datos['id_usuario_intercambio'],
                ':tipo_mensaje' => 'recibe'
            ]);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
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
