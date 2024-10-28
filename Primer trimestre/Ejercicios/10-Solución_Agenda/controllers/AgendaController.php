<?php
//Instalar en VSC la extensión PHP DocBlocker para que se autocompleten los comentarios de las funciones
//Debes escribir /** y pulsar Enter para que se genere el comentario automáticamente
require_once 'models/Contacto.php';
require_once 'models/Agenda.php';

class AgendaController
{
    private string $rutaUploads;
    private Agenda $agenda;
    private SessionController $sessionController;

    public function __construct($sessionController)
    {
        $this->rutaUploads = 'uploads/';
        $this->agenda = new Agenda();
        $this->sessionController = $sessionController;
    }

    public function enrutador(): void
    {
        $accion = isset($_GET['accion']) ? $_GET['accion'] : 'verAgenda';

        switch ($accion) {
            case 'verAgenda':
                $this->verAgenda();
                break;
            case 'agregarContacto':
                $this->agregarContacto();
                break;
            case 'eliminarContacto':
                $this->eliminarContacto();
                break;
            case 'buscar':
                $this->buscarContacto();
                break;
            case 'modificar':
                $this->modificarContacto();
                break;
            case 'inactividad':
                $this->mostrarInactividad();
                break;
            case 'cerrarSesion':
                $this->cerrarSesion();
                break;
            case 'fin':
                $this->mostrarCierre();
                break;
            default:
                $this->verAgenda();
                break;
        }
    }

    private function convertirArray(array $resultados = null): array
    {
        $contactosArray = [];

        foreach ($resultados as $contacto) {
            $contactosArray[] = [
                'nombre' => $contacto->getNombre(),
                'telefono' => $contacto->getTelefono(),
                'imagen' => $contacto->getImagen()
            ];
        }
        return $contactosArray;
    }

    private function renderVista(string $vista, array $resultados = null, string $error = null): void
    {
        // Si hay resultados, convertirlos a un array de arrays asociativos
        $contactos = $resultados ? $this->convertirArray($resultados) : [];

        include 'views/header.php';
        include "views/$vista.php";
        include 'views/footer.php';
    }

    public function verAgenda(): void
    {
        $contactos = $this->agenda->getContactos();
        $error = empty($contactos) ? "La agenda está vacía" : null;
        $this->renderVista('agenda', $contactos, $error);
    }

    public function mostrarInsertar(string $error = null): void
    {
        $this->renderVista('insertar', null, $error);
    }

    public function mostrarEliminar(string $error = null): void
    {
        $this->renderVista('eliminar', null, $error);
    }

    public function mostrarBusqueda(array $resultados, string $error = null): void
    {
        $this->renderVista('buscar', $resultados, $error);
    }

    public function mostrarModificar(string $error = null): void
    {
        $contactos = $this->agenda->getContactos();
        $this->renderVista('modificar', $contactos, $error);
    }

    public function mostrarInactividad(): void
    {
        include 'views/inactividad.php';
    }

    public function mostrarCierre(): void
    {
        include 'views/cierre.php';
    }

    public function buscarContacto(): void
    {
        $resultados = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultados = $this->agenda->buscarContacto($error);
        } else {
            $error = empty($this->agenda->getContactos()) ? "La agenda está vacía" : null;
        }
        $this->mostrarBusqueda($resultados, $error);
        // $this->renderVista('buscar', $resultados, $error);        
    }

    public function agregarContacto(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $this->agenda->agregarContacto();
            if ($resultado) {
                $this->mostrarInsertar($resultado);
                // $this->renderVista('insertar', null, $resultado);
            } else {
                $this->verAgenda();
            }
        } else {
            $this->mostrarInsertar();
            // $this->renderVista('insertar');
        }
    }
    public function modificarContacto(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error = $this->agenda->modificarContacto();
        } else {
            $error = empty($this->agenda->getContactos()) ? "La agenda está vacía" : null;
        }
        $this->mostrarModificar($error);
    }

    public function eliminarContacto(): void
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error = $this->agenda->eliminarContacto();
        } else {
            $error = empty($this->agenda->getContactos()) ? "La agenda está vacía" : null;
        }
        $this->mostrarEliminar($error);
        // $this->renderVista('eliminar', null, $error);
    }

    public function cerrarSesion(): void
    {
        $this->sessionController->cerrarSesion();
    }
}
