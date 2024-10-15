<?php
class Viaje
{
    private $nombre;
    private $descripcion;
    private $precio_por_dia;
    private $imagen;

    public function __construct($nombre, $descripcion, $precio_por_dia, $imagen)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio_por_dia = $precio_por_dia;
        $this->imagen = $imagen;
    }

    // Métodos getters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecioPorDia()
    {
        return $this->precio_por_dia;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    // Métodos setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setPrecioPorDia($precio_por_dia)
    {
        $this->precio_por_dia = $precio_por_dia;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function calcularPrecioTotal($dias)
    {
        return $this->precio_por_dia * $dias;
    }
}
