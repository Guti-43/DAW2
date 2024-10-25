<?php
class Voto
{
    private int $id;
    private int $usuarioId;
    private int $temaId; // Se asocia solo con un tema
    private string $tipo; // 'positivo' o 'negativo'

    public function __construct(int $id, int $usuarioId, int $temaId, string $tipo)
    {
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->temaId = $temaId;
        $this->tipo = $tipo;
    }

    public function guardar(): bool
    {
        // Implementación para guardar un voto para un tema
        return true;
    }

    public function eliminar(): bool
    {
        // Implementación para eliminar un voto para un tema
        return true;
    }

    public function verVotosTema(int $temaId): array
    {
        // Implementación para ver los votos de un tema
        return [];
    }
}
