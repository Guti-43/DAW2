<?php
class ControladorSesiones
{
    protected $mensaje = '';
    protected $datos = [];
    protected $nombreSesion = 'mi_sesion';

    public function iniciarSesion($usuario, $nombreSesion = 'mi_sesion')
    {
        $this->nombreSesion = $nombreSesion;
        session_name($this->nombreSesion);
        session_set_cookie_params([
            'path' => dirname($_SERVER['SCRIPT_NAME']), // Usar la ruta del script actual
            'httponly' => true,
            'secure' => false
        ]);
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['SID'] = session_id(); // Guardar el SID de la sesión
        $_SESSION['ultima_actividad'] = time(); // Guardar el tiempo de la última actividad
        $this->mensaje = "Sesión iniciada correctamente para el usuario $usuario.";
    }

    public function añadirVariableSesion($clave, $valor)
    {
        $this->verificarInactividad();
        if (isset($_COOKIE[$this->nombreSesion])) {
            $_SESSION[$clave] = $valor;
            $_SESSION['ultima_actividad'] = time(); // Actualizar el tiempo de la última actividad
            $this->mensaje = "Variable añadida a la sesión correctamente.";
        } else {
            $this->mensaje = "Error al añadir variable a la sesión. No se ha encontrado la sesión.";
        }
    }

    public function visualizarDatos()
    {
        $this->verificarInactividad();
        $this->datos = [
            'sesion' => null,
            'cookie' => null
        ];
        if (isset($_COOKIE[$this->nombreSesion])) {
            $this->mensaje = "Datos de la sesión y cookie visualizados.";
            $this->datos = [
                'sesion' => $_SESSION,
                'cookie' => $_COOKIE
            ];
            $_SESSION['ultima_actividad'] = time(); // Actualizar el tiempo de la última actividad
        } else {
            $this->mensaje = "No hay sesión activa.";
        }
    }

    public function cerrarSesion()
    {

        if (isset($_COOKIE[$this->nombreSesion])) {
            if (session_status() !== PHP_SESSION_ACTIVE && isset($_COOKIE[$this->nombreSesion])) {
                session_name($this->nombreSesion);
                session_start();
            }

            // Limpiar todas las variables de sesión
            $_SESSION = [];

            // Destruir la sesión
            session_destroy();

            // Borrar la cookie de sesión
            setcookie(
                $this->nombreSesion, // Nombre de la cookie de sesión
                '', // Valor vacío
                time() - 42000, // Hace que caduque, tiempo pasado
                dirname($_SERVER['SCRIPT_NAME']), // Usar la ruta del script actual
                $_SERVER['SERVER_NAME'], // Dominio actual
                false, // También para http
                true // NO se puede acceder a la cookie por JavaScript
            );
            $this->mensaje = "Sesión cerrada correctamente.";
        } else {
            $this->mensaje = "No hay sesión activa para cerrar.";
        }
    }

    protected function verificarInactividad()
    {
        if (session_status() !== PHP_SESSION_ACTIVE && isset($_COOKIE[$this->nombreSesion])) {
            session_name($this->nombreSesion);
            session_start();
        }

        if (isset($_SESSION['ultima_actividad']) && (time() - $_SESSION['ultima_actividad'] > 5)) {
            // Redirigir a la vista de inactividad 
            $this->cerrarSesion();
            include 'vistas/inactividad.php';
            exit();
        } else {
            $_SESSION['ultima_actividad'] = time(); // Actualizar el tiempo de la última actividad
        }
    }

    public function enrutador()
    {
        $action = $_GET['action'] ?? '';
        switch ($action) {
            case 'iniciar':
                $this->iniciarSesion('Pepito');
                $mensaje = $this->mensaje;
                break;
            case 'añadir':
                $this->añadirVariableSesion('claveEjemplo', 'valorEjemplo');
                $mensaje = $this->mensaje;
                break;
            case 'visualizar':
                $this->visualizarDatos();
                $datos = $this->datos;
                $mensaje = $this->mensaje;
                break;
            case 'cerrar':
                $this->cerrarSesion();
                $mensaje = $this->mensaje;
                include 'vistas/menu.php';
                include 'vistas/sesion_cerrada.php';
                return;
            default:
                include 'vistas/menu.php';
                return;
        }
        include 'vistas/menu.php';
        include 'vistas/informativa.php';
    }
}
