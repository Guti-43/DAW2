<?php
class ArticuloController
{
    public function __construct()
    {
        SessionController::validarSesion();
        $accion = $_REQUEST['accion'] ?? 'index';

        switch ($accion) {
            case 'intercambiar':
                $this->intercambiar();
                break;
            case 'actualizar':
                $this->actualizar();
                break;
            case 'realizarIntercambio':
                $this->realizarIntercambio();
                break;
            default:
                $this->index();
                break;
        }
    }
    public function index($error = null)
    {
        SessionController::validarSesion();
        $articulos = Articulo::obtenerInstancia()->obtenerArticulos($_SESSION['idusuario']);
        require_once "app/view/header.php";
        require_once "app/view/articulos.php";
        require_once "app/view/footer.php";
    }

    private function validarDatosArticulo($datos)
    {
        return isset($datos['idArticulo'])
            && isset($datos['puntos'])
            && filter_var($datos['puntos'], FILTER_VALIDATE_INT)
            && $datos['puntos'] > 0
            && $datos['puntos'] <= 500;
    }

    public function actualizar($error = null)
    {
        SessionController::validarSesion();
        $_POST = $this->limpiar($_POST);
        if (!$this->validarDatosArticulo($_POST)) {
            $mensaje = "Datos incorrectos. Puntos debe ser un número entero entre 1 y 500";
        } else {
            $disponible = isset($_POST['disponible']) ? 1 : 0;
            $error = Articulo::obtenerInstancia()->actualizarArticulo($_POST['idArticulo'], $disponible, $_POST['puntos']);
            $mensaje = $error !== true ? $error : "Artículo actualizado con éxito";
        }
        $this->index($mensaje);
    }

    public function intercambiar($error = null)
    {
        SessionController::validarSesion();
        $articulos = Articulo::obtenerInstancia()->obtenerIntercambio($_SESSION['idusuario']);
        $misArticulos = Articulo::obtenerInstancia()->obtenerArticulosDisponibles($_SESSION['idusuario']);
        $error = empty($articulos) ? "No hay artículos disponibles para intercambio" : null;
        require_once "app/view/header.php";
        require_once "app/view/intercambiar.php";
        require_once "app/view/footer.php";
    }
    public function realizarIntercambio()
    {
        SessionController::validarSesion();
        $_POST = $this->limpiar($_POST);
        if (!isset($_POST['idTrueque']) || !isset($_POST['miArticulo'])) {
            $mensaje = "Faltan datos para realizar el intercambio";
        } else {
            $error = Articulo::obtenerInstancia()->operacionIntercambiar($_POST['idTrueque'], $_POST['miArticulo']);
            $mensaje = $error === true ? "Intercambio realizado con éxito" : $error;
        }
        $this->intercambiar($mensaje);
    }

    private function limpiar($input)
    {
        //Array_map espera como primer argumento una funcion
        //y como segundo argumento un array
        // Y aplica la funcion a cada elemento del array
        return is_array($input)
            ? array_map([$this, 'limpiar'], $input)
            : (htmlspecialchars(trim(strip_tags($input))) ?? null);
    }
    private function limpiar2($input)
    {
        // Verificar si el input es un array
        if (is_array($input)) {
            // Si es un array, aplicar la función limpiar a cada elemento del array
            return array_map([$this, 'limpiar'], $input);
        } else {
            // Si no es un array, limpiar el valor individual
            return htmlspecialchars(trim(strip_tags($input))) ?? null;
        }
    }
}
