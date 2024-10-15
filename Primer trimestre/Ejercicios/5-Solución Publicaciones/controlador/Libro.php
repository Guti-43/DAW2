<?php
require_once 'Publicacion.php';
require_once 'TablasSimuladas.php';

class Libro extends Publicacion
{
    private string $generoLiterario;

    public function __construct(string $titulo, string $autor, int $anio, int $paginas, string $genero)
    {
        parent::__construct($titulo, $autor, $anio, $paginas);
        if (!in_array($genero, TablasSimuladas::$generos)) {
            $genero = 'Ficción';
        }
        $this->generoLiterario = $genero;
    }

    public function precioFinal(): float
    {
        $precio = parent::precioFinal();
        if ($this->numeroPaginas > 500) {
            $precio += TablasSimuladas::$precios['libro_mas_500_paginas'];
        }
        return $precio;
    }
}
