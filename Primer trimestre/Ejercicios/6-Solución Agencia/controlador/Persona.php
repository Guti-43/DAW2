<?php
abstract class Persona
{
    // protected $nombre;
    // protected $email;

    public function __construct(protected string $nombre, protected string $email)
    {
        //NO es necesario asignar las propiedades al utilizar esta sintaxis
    }

    abstract public function mostrarInformacion();
}
