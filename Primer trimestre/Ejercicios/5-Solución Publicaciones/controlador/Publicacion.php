<?php
class Publicacion
{
    protected float $precioBase;
    protected string $titulo;
    protected string $autor;
    protected int $anioPublicacion;
    protected int $numeroPaginas;
    public float $precioFinal;
    public string $tipoPublicacion;

    public function __construct(string $titulo, string $autor, int $anio, int $paginas)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anioPublicacion = $anio;
        $this->numeroPaginas = $paginas;
        $this->precioBase = TablasSimuladas::$precios['publicacion_estandar'];

        $this->comprobarAnio();
        $this->comprobarPaginas();
    }

    protected function comprobarAnio()
    {
        if ($this->anioPublicacion < 0) {
            $this->anioPublicacion = 2024;
        }
    }

    protected function comprobarPaginas()
    {
        if ($this->numeroPaginas <= 0) {
            $this->numeroPaginas = 10;
        }
    }

    public function precioFinal(): float
    {
        if ($this->numeroPaginas > 300) {
            $this->precioBase += 10;
        }
        return $this->precioBase;
    }

    // Métodos getter
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function getAnioPublicacion(): int
    {
        return $this->anioPublicacion;
    }

    public function getNumeroPaginas(): int
    {
        return $this->numeroPaginas;
    }
}
