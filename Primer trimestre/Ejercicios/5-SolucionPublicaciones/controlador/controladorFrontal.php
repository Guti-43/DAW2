<?php
require_once 'TablasSimuladas.php';
require_once 'Publicacion.php';
require_once 'Libro.php';
require_once 'Revista.php';

$publicaciones = [];

// Array asociativo de títulos y autores
$titulosAutores = [
    "El Gran Libro" => "Juan Pérez",
    "Aventuras en el Espacio" => "María López",
    "Historias de la Vida" => "Carlos García",
    "El Misterio del Bosque" => "Ana Martínez",
    "Cuentos de la Ciudad" => "Luis Rodríguez",
    "La Ciencia del Futuro" => "Elena Fernández",
    "Romance en París" => "Miguel Sánchez",
    "Terror Nocturno" => "Laura Gómez",
    "Fantasía y Realidad" => "José Hernández",
    "Viaje al Centro de la Tierra" => "Carmen Díaz"
];

// Crear 10 objetos de Publicacion, Libro y Revista con datos aleatorios
for ($i = 0; $i < 10; $i++) {
    $tipo = rand(1, 3);
    $titulo = array_rand($titulosAutores);
    $autor = $titulosAutores[$titulo];
    $anio = rand(1900, 2024);
    $paginas = rand(50, 600);

    switch ($tipo) {
        case 1:
            $publicaciones[] = new Publicacion($titulo, $autor, $anio, $paginas);
            break;
        case 2:
            $genero = array_rand(TablasSimuladas::$generos);
            $genero = TablasSimuladas::$generos[$genero];
            $publicaciones[] = new Libro($titulo, $autor, $anio, $paginas, $genero);
            break;
        case 3:
            $numero = rand(1, 100);
            $periodicidad = array_rand(TablasSimuladas::$periodicidad);
            $publicaciones[] = new Revista($titulo, $autor, $anio, $paginas, $numero, $periodicidad);
            break;
    }
}

// Calcular el precio final y el tipo de cada publicación
$totalPrecio = 0;
foreach ($publicaciones as $publicacion) {
    $precioFinal = $publicacion->precioFinal();
    $totalPrecio += $precioFinal;
    $tipoPublicacion = 'Publicación';
    if ($publicacion instanceof Libro) {
        $tipoPublicacion = 'Libro';
    } elseif ($publicacion instanceof Revista) {
        $tipoPublicacion = 'Revista';
    }
    $publicacion->precioFinal = $precioFinal;
    $publicacion->tipoPublicacion = $tipoPublicacion;
}
var_dump($publicaciones);
// Incluir la vista para mostrar la tabla
require_once 'vista/vista.php';
