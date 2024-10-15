<?php
require_once 'Persona.php';


class Usuario extends Persona
{
    private string $tipo;

    public function __construct(string $nombre, string $email, string $tipo)
    {
        parent::__construct($nombre, $email); // Llama al constructor de la clase padre
        $this->tipo = $tipo;
    }

    // Métodos getters
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTipo(): string
    {
        return $this->tipo; // Método getter para tipo
    }

    // Métodos setters
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }
    // Método para mostrar la información del usuario
    public function mostrarInformacion(): string
    {
        return "Nombre: $this->nombre, Email: $this->email, Tipo: $this->tipo";
    }
}
