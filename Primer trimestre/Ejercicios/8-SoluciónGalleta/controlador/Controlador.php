<?php
class Controlador
{
    // Propiedades estáticas para los valores por defecto
    private static $idiomaPorDefecto = 'es';
    private static $fondoPorDefecto = 'img/fondo1.jpg';
    private static $menuPorDefecto = ['Inicio', 'Contacto'];

    public function manejarSolicitud()
    {
        // Verifica si el parámetro 'accion' está presente en la URL, de lo contrario,
        // establece una cadena vacía como valor por defecto
        $accion = isset($_GET['accion']) ? htmlspecialchars($_GET['accion']) : '';

        switch ($accion) {
            case 'cambiarIdioma':
                $this->cambiarIdioma();
                break;
            case 'cambiarFondo':
                $this->cambiarFondo();
                break;
            case 'personalizarMenu':
                $this->personalizarMenu();
                break;
            default:
                self::mostrarInicio();
                break;
        }
    }

    private function cambiarIdioma()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idioma = htmlspecialchars($_POST['idioma'] ?? self::$idiomaPorDefecto);
            setcookie('idioma', $idioma, time() + (86400 * 30), "/");
            //Establezco la cookie en la variable $_COOKIE para que se pueda usar en la vista
            $_COOKIE['idioma'] = $idioma;
            self::mostrarInicio();
            //Otra forma es redireccionar
            // header('Location: index.php');
            // exit;
        } else {
            $idiomaSeleccionado = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : self::$idiomaPorDefecto;
            include "vistas/menu_idioma.php";
        }
    }

    private function cambiarFondo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fondo = htmlspecialchars($_POST['fondo'] ?? self::$fondoPorDefecto);
            // Actualizar la cookie del fondo, con duración de 30 días
            setcookie('imagen_fondo', $fondo, time() + (86400 * 30), "/");
            //Establezco la cookie en la variable $_COOKIE para que se pueda usar en la vista
            $_COOKIE['imagen_fondo'] = $fondo;
            self::mostrarInicio();
            
            //Otra forma es redireccionar
            // header('Location: index.php');
            // exit;
        } else {
            // Verificar si ya existe una cookie de imagen de fondo
            $fondoSeleccionado = isset($_COOKIE['imagen_fondo']) ? $_COOKIE['imagen_fondo'] : self::$fondoPorDefecto;
            include "vistas/menu_fondo.php";
        }
    }

    private function personalizarMenu()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar si el usuario seleccionó al menos un elemento del menú
            if (!isset($_POST['menu'])) {
                $error = 'Debes seleccionar al menos un elemento del menú';
                $menuSeleccionado = [];
                include "vistas/menu_menu.php";
            } else {
                // Convertir el array recibido en un string para almacenarlo en la cookie
                // Si el usuario selecciona "Inicio" y "Contacto", el array $_POST['menu'] será ['Inicio', 'Contacto']
                // implode() convierte el array en un string separado por comas: "Inicio,Contacto"
                $menu = implode(",", $_POST['menu']);
                $menu = htmlspecialchars($menu, ENT_QUOTES, 'UTF-8');

                // Actualizar la cookie del menú personalizado, con duración de 30 días
                setcookie('menu_personalizado', $menu, time() + (86400 * 30), "/");
                //Establezco la cookie en la variable $_COOKIE para que se pueda usar en la vista
                $_COOKIE['menu_personalizado'] = $menu;
                self::mostrarInicio();
                
                //Otra forma es redireccionar
                // header('Location: index.php');
                // exit;
            }
        } else {
            // Verificar si ya existe una cookie de menú personalizado y convertir el string en un array
            // Si la cookie menu_personalizado contiene la cadena "Inicio,Contacto,Perfil", explode() la dividirá en el array ["Inicio", "Contacto", "Perfil"].
            $menuSeleccionado = isset($_COOKIE['menu_personalizado']) ? explode(",", $_COOKIE['menu_personalizado']) : self::$menuPorDefecto;
            include "vistas/menu_menu.php";
        }
    }

    private static function mostrarInicio()
    {
        $modelo = new Modelo();
        $datos = $modelo->obtenerDatos();

        // Extraer los datos que envía el modelo en un array asociativo para mostrarlos en la vista
        $mensajeMostrar = $datos['mensaje'];
        $fondo = $datos['fondo'];
        $menu = $datos['menu']; // Array de elementos del menú

        include 'vistas/menuPrincipal.php';
    }
}
