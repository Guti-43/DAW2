<?php
class UsuarioController
{
    public static function index()
    {
        if (SessionController::validarSesion()) {
            require_once "app/view/header.php";
            require_once "app/view/home.php";
            require_once "app/view/footer.php";
        }
    }

    public static function mensajes()
    {
        SessionController::validarSesion();
        $mensajeMostrar = Usuario::obtenerInstancia()->obtenerYConstruirMensajes($_SESSION['idusuario']);

        $error = empty($mensajeMostrar) ? "No hay mensajes" : null;

        require_once "app/view/header.php";
        require_once "app/view/mensajes.php";
        require_once "app/view/footer.php";
    }
}
