<?php
class Controlador {

    private $modelo;

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    // Método para manejar la solicitud y redirigir a la acción correspondiente
    public function manejarSolicitud() {
        if (isset($_GET['accion'])) {
            switch ($_GET['accion']) {
                case 'cambiarIdioma':
                    $this->cambiarIdioma();
                    break;
                case 'cambiarFondo':
                    $this->cambiarFondo();
                    break;
                case 'personalizarMenu':
                    $this->personalizarMenu();
                    break;
                case 'mostrarInicio':
                    $this->mostrarInicio();
                    break;
                default:
                    $this->mostrarInicio();
                    break;
            }
        } else {
            $this->mostrarInicio();
        }
    }

    
    // Método para cambiar el idioma de la página
    private function cambiarIdioma(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idioma'])) {
            $nuevoIdioma = $_POST['idioma'];
            $this->modelo->setIdioma($nuevoIdioma);
    
            setcookie('idioma', $nuevoIdioma, time() + (86400 * 30), "/");
            header("Location: index.php");
        } else {
            include_once "vistas/menu_idioma.php";
        }
    }
    
    
    // Método para cambiar la imagen de fondo de la página
    private function cambiarFondo(){
        include_once "vistas/menu_fondo.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fondo'])) {
            $nuevoFondo = $_POST['fondo'];
            $this->modelo->setFondo($nuevoFondo);

            setcookie('fondo', $nuevoFondo, time() + (86400 * 30), "/");

            header("Location: index.php");
        }else{
            include_once "vistas/menu_fondo.php";
        }
    }
    // Método para personalizar los elementos del menú
    private function personalizarMenu(){
        include_once "vistas/menu_menu.php";
    }
    // Método para mostrar la página de inicio con los datos actuales
    private function mostrarInicio(){
        include_once 'vistas/menuPrincipal.php';
    }
}