<?php
require_once 'Publicacion.php';
require_once 'TablasSimuladas.php';

class Revista extends Publicacion
{
    private int $numeroRevista;
    private int $periodicidad;

    public function __construct(string $titulo, string $autor, int $anio, int $paginas, int $numero, int $periodicidad)
    {
        parent::__construct($titulo, $autor, $anio, $paginas);
        if (!array_key_exists($periodicidad, TablasSimuladas::$periodicidad)) {
            $periodicidad = 1;
        }
        $this->numeroRevista = $numero;
        $this->periodicidad = $periodicidad;
    }

    public function precioFinal(): float
    {
        $precio = parent::precioFinal();
        if ($this->periodicidad == 1) {
            $precio += TablasSimuladas::$precios['revista_semanal'];
        }
        if ($this->numeroPaginas > 100) {
            $precio += TablasSimuladas::$precios['revista_mas_100_paginas'];
        }
        return $precio;
    }
}
