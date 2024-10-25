<?php
require_once 'controllers/SessionController.php';
require_once 'controllers/TemaController.php';
require_once 'controllers/VotoController.php';
require_once 'controllers/ComentarioController.php';

class MainController
{
    private SessionController $sessionController;

    public function __construct()
    {
        $this->sessionController = new SessionController();
    }

    public function enrutador(): void
    {

        // Obtener la acción de la solicitud
        $accion = $_GET['accion'] ?? 'verTemas';



        switch ($accion) {
            case 'verTemas':

                break;

            case 'agregarTema':

                break;

            case 'verTema':

                break;

            case 'votarTema':

                break;

            case 'agregarComentario':

                break;

            case 'logout':

                break;

            default:

                break;
        }
    }
}
