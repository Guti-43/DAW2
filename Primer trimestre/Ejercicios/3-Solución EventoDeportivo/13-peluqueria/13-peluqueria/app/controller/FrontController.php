<?php
class FrontController
{
    // Establece un controlador por defecto por si la URL no especifica ninguno o no es válida
    private function cargarControladorDefecto()
    {
        $controlador = new SessionController();
        $controlador->index(); // Método que muestra la página de login
    }

    // Maneja la petición HTTP (URL recibida) y carga el controlador correspondiente o el controlador por defecto si no se específica ninguno
    public function manejarPeticion()
    {
        if (isset($_REQUEST["controlador"])) {
            $this->cargarControlador($_REQUEST["controlador"]);
        } else {
            $this->cargarControladorDefecto();
        }
    }

    // Carga el controlador correspondiente según la URL recibida
    // Si la URL no específica un controlador válido, se carga el controlador por defecto
    public function cargarControlador($nombreControlador)
    {
        $controlador = null;

        switch ($nombreControlador) {
            case "usuario":
                $controlador = new UsuarioController();
                break;
            case "citas":
                $controlador = new CitaController();
                break;
            case "session":
                $controlador = new SessionController();
                break;
            default:
                $this->cargarControladorDefecto();
                return;
        }

        // Llamar a un método especificado en la URL o al método por defecto
        // Si el método especificado no existe, se carga el método por defecto que es index() en cada controlador
        // Además, se pasa el parámetro de la acción si es que se especifica en la URL, aunque no sea obligatorio y no corresponda a un método

        if (isset($_REQUEST["accion"]) && method_exists($controlador, $_REQUEST["accion"])) {
            $accion = $_REQUEST["accion"];
            $controlador->$accion();
        } else {
            //Puede que exista accion pero no sea un metodo del controlador
            //En ese caso se llama al metodo por defecto, pasando la accion como parametro
            $controlador->index($_REQUEST["accion"] ?? null); // Método por defecto de cada controlador
        }
    }
}
