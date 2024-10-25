<?php
require_once 'models/Comentario.php';

class ComentarioController
{
    /**
     * Crea un nuevo comentario.
     * Valida los datos y llama al modelo para guardar el comentario.
     */
    public function agregarComentario(int $temaId, int $usuarioId, string $contenido): bool
    {
        // Crear un nuevo objeto Comentario
        return true;
    }

    /**
     * Elimina un comentario específico.
     * Llama al modelo para eliminar el comentario y manejar la lógica correspondiente.
     */
    public function eliminarComentario(int $id): bool
    {
        return true;
    }

    /**
     * Muestra los comentarios de un tema específico.
     * Llama al modelo para obtener todos los comentarios y los renderiza en la vista.
     */
    public function verComentarios(int $temaId): void
    {
        // Crear una instancia del modelo Comentario
    }
}
