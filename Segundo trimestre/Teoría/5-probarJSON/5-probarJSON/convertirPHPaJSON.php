<?php
// Cabecera para trabajar con JSON
header('Content-Type: application/json;charset=utf-8');

// Datos en PHP (array asociativo)
$articulo = [
    "titulo" => "Esto es un artículo",
    "visitas" => "345",
    "publicado" => true,
    "categoria" => null,
    "precio" => 7.4,
    "comentarios" => [
        [
            "autor" => "Luisa López",
            "mensaje" => "Muy buen artículo"
        ],
        [
            "autor" => "Carlos Pérez",
            "mensaje" => "Artículo muy malo",
            "URL" => "http://www.ejemplo.com"
        ],

    ],
    ["primero", "segundo", "tercero"]
];

// Convertir de PHP a JSON
// echo "JSON generado a partir del array en PHP:";
//$json = json_encode($articulo);
$json = json_encode($articulo, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
echo $json;
