<?php

class Contacto
{
    private string $nombre;
    private string $telefono;
    private ?string $imagen;

    public function __construct(string $nombre, string $telefono, ?string $imagen = null)
    {
        $this->nombre = strtoupper($nombre);
        $this->telefono = $telefono;
        $this->imagen = $imagen;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }
}
