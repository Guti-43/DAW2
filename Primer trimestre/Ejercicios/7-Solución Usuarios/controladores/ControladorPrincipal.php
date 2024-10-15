<?php
require_once 'controladores/ControladorUsuario.php';
require_once 'controladores/ControladorSubirImagen.php';

class ControladorPrincipal
{
    // Propiedades estáticas para los controladores
    private static $controladorUsuario;
    private static $controladorSubirImagen;

    // Inicializar controladores en un método estático
    public static function inicializar()
    {
        self::$controladorUsuario = new ControladorUsuario();
        self::$controladorSubirImagen = new ControladorSubirImagen();
    }

    // Método estático para manejar solicitudes
    public static function manejarSolicitud()
    {

        // Inicializar el controlador principal
        ControladorPrincipal::inicializar();

        // Comprobar qué acción se solicita
        $accion = $_GET['accion'] ?? 'login'; // Acción por defecto es 'login'

        switch ($accion) {
            case 'login':
                self::$controladorUsuario->mostrarFormulario();
                break;

            case 'iniciar_sesion':
                self::$controladorUsuario->iniciarSesion();
                break;
            case 'presentacion':
                self::$controladorUsuario::mostrarVistaPresentacion();
                break;

            case 'anadir_usuario':
                self::$controladorUsuario->anadirUsuario();
                break;

            case 'subir_imagen':
                self::$controladorSubirImagen->subirImagenPerfil($_POST['nombre_usuario']);
                break;

            default:
                self::$controladorUsuario->mostrarFormulario();
                break;
        }
    }
}
