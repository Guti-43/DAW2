<?php
require_once 'models/Tema.php';
require_once 'models/Voto.php';

class TemaController
{
    private Tema $temaModel;

    public function __construct()
    {
        // Crear una instancia del modelo Tema      
    }

    /**
     * Crea un nuevo tema.
     * Valida los datos y llama al modelo para guardar el tema.
     */
    public function agregarTema(string $titulo, string $descripcion, int $usuarioId): bool
    {
        return true;
    }

    /**
     * Muestra la lista de todos los temas.
     * Llama al modelo para obtener la lista de temas y renderiza la vista.
     */
    public function verTemas(): void {}

    /**
     * Muestra los detalles de un tema específico.
     * Llama al modelo para obtener los detalles del tema.
     */
    public function verTema(int $id): void {}

    /**
     * Elimina un tema específico.
     * Llama al modelo para eliminar el tema y manejar la redirección.
     */
    public function eliminarTema(int $id): bool
    {
        return true;
    }

    /**
     * Permite a un usuario votar en un tema.
     * Valida el tipo de voto y llama al modelo para registrar el voto.
     */
    public function votar(int $usuarioId, int $temaId, string $tipo): bool
    {
        // Crear un nuevo objeto Voto      
        return true;
    }

    /**
     * Elimina un voto para un tema.
     * Llama al modelo para eliminar el voto y manejar la lógica correspondiente.
     */
    public function eliminarVoto(int $usuarioId, int $temaId): bool
    {
        return true;
    }
}
