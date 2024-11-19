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


    public function obtenerPerfil($id)
    {
        try {
            $this->cursor = $this->conexion->prepare("SELECT nombre, rol, foto FROM Usuarios WHERE id = :id");
            $this->cursor->execute([':id' => $id]);
            return $this->cursor->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public static function validarCredenciales($nombre, $contrasena)
    {
        try {
            $resultado = false;
            $db = self::obtenerInstancia()->obtenerConexion();
            $cursor = $db->prepare("SELECT hashp, id, rol, foto, nombre FROM Usuarios WHERE nombre = :nombre ");
            $cursor->execute([':nombre' => $nombre]);
            if ($cursor->rowCount() > 0) {
                $row = $cursor->fetch(PDO::FETCH_OBJ);
                if (password_verify($contrasena, $row->hashp)) $resultado = $row;
            }
            $cursor->closeCursor();
            return $resultado;
        } catch (PDOException $e) {
            self::manejarError($e);
        }
    }

    public function obtenerYConstruirMensajes($idUsuario)
    {
        $mensajes = $this->obtenerMensajes($idUsuario);
        $mensajeMostrar = [];
        if ($mensajes) {
            foreach ($mensajes as $mensaje) {
                $mensajeMostrar[] = $this->construirMensaje($mensaje);
            }
        }
        return $mensajeMostrar;
    }

    public function obtenerMensajes($id)
    {
        try {
            $this->cursor = $this->conexion->prepare("SELECT * FROM Mensajes WHERE id_usuario = :id");
            $this->cursor->execute([':id' => $id]);
            return $this->cursor->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->manejarError($e);
        }
    }

    public function construirMensaje($mensaje)
    {
        try {
            $mensajeTexto = '';
            //Opcion 1 con subconsultas
            $sql = "SELECT 
                i.id_usuario_ofrece, i.id_usuario_recibe, i.id_articulo_ofrecido, i.id_articulo_recibido, i.fecha_intercambio,
                (SELECT nombre FROM usuarios WHERE id = i.id_usuario_ofrece) AS nombre_ofrece,
                (SELECT nombre FROM usuarios WHERE id = i.id_usuario_recibe) AS nombre_recibe,
                (SELECT nombre FROM articulos WHERE id = i.id_articulo_ofrecido) AS articulo_ofrecido,
                (SELECT nombre FROM articulos WHERE id = i.id_articulo_recibido) AS articulo_recibido
            FROM intercambios i
            WHERE i.id = :id_intercambio";

            //Opcion 2 con joins
            $sql = "SELECT 
                i.id_usuario_ofrece, i.id_usuario_recibe, i.id_articulo_ofrecido, i.id_articulo_recibido, i.fecha_intercambio,
                u1.nombre AS nombre_ofrece, u2.nombre AS nombre_recibe,
                a1.nombre AS articulo_ofrecido, a2.nombre AS articulo_recibido
            FROM intercambios i
            JOIN usuarios u1 ON i.id_usuario_ofrece = u1.id
            JOIN usuarios u2 ON i.id_usuario_recibe = u2.id
            JOIN articulos a1 ON i.id_articulo_ofrecido = a1.id
            JOIN articulos a2 ON i.id_articulo_recibido = a2.id
            WHERE i.id = :id_intercambio";

            $this->cursor = $this->conexion->prepare($sql);
            $this->cursor->execute([':id_intercambio' => $mensaje['id_intercambio']]);
            $intercambio = $this->cursor->fetch(PDO::FETCH_ASSOC);
            // var_dump($intercambio);
            // exit;

            if ($mensaje['tipo_mensaje'] == 'ofrece') {
                // Construir mensaje para el usuario que ofrece el artículo
                $mensajeTexto = "                   
                    ¡Hola <span class='nombre'>{$intercambio['nombre_ofrece']}</span>!<br>
                    Tu intercambio con <span class='nombre'>{$intercambio['nombre_recibe']}</span> ha sido satisfactorio.<br>
                    El artículo que ofreciste: <span class='articulo'>{$intercambio['articulo_ofrecido']}</span>
                    ha sido intercambiado por: <span class='articulo'>{$intercambio['articulo_recibido']}.</span><br>
                    Fecha del intercambio: <span class='fecha'>{$intercambio['fecha_intercambio']}</span><br>       
                    ¡Gracias por participar!";
            } elseif ($mensaje['tipo_mensaje'] == 'recibe') {
                // Construir mensaje para el usuario que recibe el artículo                  
                $mensajeTexto = "                   
                        ¡Hola <span class='nombre'>{$intercambio['nombre_recibe']}</span>!<br>
                        Has recibido el artículo <span class='articulo'>{$intercambio['articulo_ofrecido']}</span> 
                        de <span class='nombre'>{$intercambio['nombre_ofrece']}</span>
                        a cambio de tu artículo <span class='articulo'>{$intercambio['articulo_recibido']}</span>.<br>
                        Este intercambio fue realizado el <span class='fecha'>{$intercambio['fecha_intercambio']}</span>.<br>
                        ¡Gracias por participar!";
            }
            return $mensajeTexto;
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
