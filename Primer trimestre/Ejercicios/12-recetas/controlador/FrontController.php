<?php
require_once "controlador/UsuarioController.php";
require_once "controlador/RecetasController.php";
require_once "controlador/SessionController.php";
class FrontController
{
    public function cargarControlador($nombreControlador)
    {
        $controlador = null;

        switch ($nombreControlador) {
            case "usuario":
                $controlador = new UsuarioController();
                break;
            case "recetas":
                $controlador = new RecetasController();
                break;
            default:
                $this->cargarControladorDefecto();
                return;
        }

        // Llamar a un método especificado en la URL, o al método por defecto
        if (isset($_GET["accion"]) && method_exists($controlador, $_GET["accion"])) {
            $accion = $_GET["accion"];
            $controlador->$accion();
        } else {
            $controlador->index(); // Método por defecto
        }
    }

    private function cargarControladorDefecto()
    {
        $controlador = new SessionController();
        $controlador->index(); // Método que muestra la página de inicio o login
    }

    public function manejarPeticion()
    {
        session_start();

        // Verificar si la sesión está iniciada
        if (!isset($_SESSION['usuario_id'])) {
            // Si no hay sesión iniciada, cargar el controlador de sesión
            $this->cargarControladorDefecto();
            return;
        }

        if (isset($_GET["controlador"])) {
            $this->cargarControlador($_GET["controlador"]);
        } else {
            $this->cargarControladorDefecto();
        }
    }
}
