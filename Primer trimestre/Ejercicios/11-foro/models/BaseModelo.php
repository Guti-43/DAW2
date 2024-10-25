<?php
// Clase base para compartir funcionalidad común
class BaseModelo
{
    protected int $id;
    protected string $fechaCreacion;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->fechaCreacion = date('Y-m-d H:i:s');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFechaCreacion(): string
    {
        return $this->fechaCreacion;
    }
}
