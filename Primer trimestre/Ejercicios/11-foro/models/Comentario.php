<?php

class Comentario
{
    private int $id;
    private int $temaId; // ID del tema al que pertenece el comentario
    private int $usuarioId; // ID del usuario que hizo el comentario
    private string $contenido; // Contenido del comentario
    private string $fechaCreacion; // Fecha de creación del comentario

    public function __construct(int $id, int $temaId, int $usuarioId, string $contenido)
    {
        $this->id = $id;
        $this->temaId = $temaId;
        $this->usuarioId = $usuarioId;
        $this->contenido = $contenido;
        $this->fechaCreacion = date('Y-m-d H:i:s'); // Se establece automáticamente al crear el comentario
    }

    public function guardar(): bool
    {
        // Implementación para guardar el comentario
        return true;
    }

    public function eliminar(): bool
    {
        // Implementación para eliminar el comentario
        return true;
    }

    public function verComentarios(int $temaId): array
    {
        // Implementación para ver todos los comentarios de un tema específico
        return [];
    }
}
