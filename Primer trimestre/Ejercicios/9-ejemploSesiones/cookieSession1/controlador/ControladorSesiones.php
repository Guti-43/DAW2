<?php
class ControladorSesiones
{
    protected $mensaje = '';
    protected $datos = [];

    public function iniciarSesion($usuario)
    {
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['SID'] = session_id(); // Guardar el SID de la sesión
        $this->mensaje = "Sesión iniciada correctamente para el usuario $usuario.";
    }

    public function añadirVariableSesion($clave, $valor)
    {

        if (isset($_COOKIE[session_name()])) {
            session_start();
            $_SESSION[$clave] = $valor;
            $this->mensaje = "Variable añadida a la sesión correctamente.";
        } else {
            $this->mensaje = "Error al añadir variable a la sesión. No se ha encontrado la sesión.";
        }
    }
    public function visualizarDatos()
    {
        $this->datos =
            [
                'sesion' => null,
                'cookie' => null
            ];
        if (isset($_COOKIE[session_name()])) {
            session_start();
            $this->mensaje = "Datos de la sesión y cookie visualizados.";
            $this->datos = [
                'sesion' => $_SESSION,
                'cookie' => $_COOKIE
            ];
        } else {
            $this->mensaje = "No hay sesión activa.";
        }
    }

    public function cerrarSesion()
    {
        if (isset($_COOKIE[session_name()])) {
            session_start();
            $_SESSION = [];
            session_destroy();

            // Recupero la información de la sesion actual
            //Borrar la cookie de sesión
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
            $this->mensaje = "Sesión cerrada correctamente.";
        } else {
            $this->mensaje = "No hay sesión activa para cerrar.";
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
