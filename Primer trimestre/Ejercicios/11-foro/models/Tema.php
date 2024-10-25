<?php
// Clase Tema
include "BaseModelo.php";
class Tema extends BaseModelo
{
    private string $titulo;
    private string $descripcion;
    private int $usuarioId;
    private int $votosPositivos = 0;
    private int $votosNegativos = 0;

    public function __construct(int $id, string $titulo, string $descripcion, int $usuarioId)
    {
        parent::__construct($id);
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->usuarioId = $usuarioId;
    }

    public function crearTema(): bool
    {
        // Implementación para crear un nuevo tema
        return true;
    }

    public function verTemas(): array
    {
        // Implementación para ver la lista de temas
        return [];
    }

    public function verTema(int $id): array
    {
        // Implementación para ver los detalles de un tema
        return [];
    }

    public function eliminarTema(): bool
    {
        // Implementación para eliminar un tema
        return true;
    }

    public function votar(int $usuarioId, string $tipo): bool
    {
        // Implementación para votar un tema
        return true;
    }
}
