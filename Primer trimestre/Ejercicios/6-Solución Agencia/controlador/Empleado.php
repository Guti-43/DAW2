<?php
require_once 'Persona.php';

class Empleado extends Persona
{

    public function __construct($nombre, $email, private string $puesto)
    {
        parent::__construct($nombre, $email); // Llama al constructor de la clase padre        
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

    public function getPuesto(): string
    {
        return $this->puesto;
    }

    // Métodos setters
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setPuesto($puesto): void
    {
        $this->puesto = $puesto;
    }

    // Método para mostrar la información del empleado
    public function mostrarInformacion(): string
    {
        return "Nombre: $this->nombre, Email: $this->email, Puesto: $this->puesto";
    }
}
