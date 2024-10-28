<?php
class SessionController
{
    private $tiempoMaximoInactividad = 180; // 3 minutos por defecto
    private $rutaAplicacion;
    private $rutaUploads;

    public function __construct()
    {
        //Cuidado con la ruta de la aplicación
        //Si contiene caracteres especiales al establecer los parámetros en la sesión
        //Puede que no se redireccione correctamente
        $this->rutaAplicacion = dirname($_SERVER['SCRIPT_NAME']);

        $this->rutaUploads = 'uploads/';

        // Solo iniciar la sesión si no está activa
        if (session_status() === PHP_SESSION_NONE) {
            $this->iniciarSesion();
        }

        $this->verificarInactividad();
    }

    private function iniciarSesion()
    {
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => $this->rutaAplicacion,
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => false,
            'httponly' => true
        ]);
        session_start();
    }

    public function cerrarSesion($motivo = false)
    {
        if (isset($_SESSION['contactos'])) {
            $this->eliminarImagenesDeContactos();
        }

        $_SESSION = [];
        setcookie(session_name(), '', time() - 3600, $this->rutaAplicacion);
        session_destroy();

        $this->redireccionar($motivo ? 'inactividad' : 'fin');
    }

    private function eliminarImagenesDeContactos()
    {
        foreach ($_SESSION['contactos'] as $contacto) {
            $nombreImagen = $contacto->getImagen();
            if ($nombreImagen) {
                $ruta = $this->rutaUploads . $nombreImagen;
                // Verificar si el archivo existe y es un archivo
                // para evitar errores al intentar eliminarlo
                // unlink no permite eliminar directorios
                if (file_exists($ruta) && is_file($ruta)) {
                    unlink($ruta);
                }
            }
        }
    }

    private function verificarInactividad()
    {
        if (isset($_SESSION['ultima_actividad']) && (time() - $_SESSION['ultima_actividad'] > $this->tiempoMaximoInactividad)) {
            $this->cerrarSesion(true);
        } else {
            $_SESSION['ultima_actividad'] = time();
        }
    }

    private function redireccionar($accion = null)
    {
        header("Location: index.php?accion=$accion");
        exit();
    }
}
