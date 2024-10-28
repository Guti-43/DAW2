<?php
class Modelo
{
    // Propiedades estáticas para los valores por defecto
    private static $menuPorDefecto = ['Inicio', 'Contacto'];
    private static $fondoPorDefecto = 'img/fondo1.jpg';
    private static $idiomaPorDefecto = 'es';
    private static $mensajesPorDefecto = [
        'es' => 'Bienvenido a nuestro sitio',
        'en' => 'Welcome to our website',
        'fr' => 'Bienvenue sur notre site'
    ];

    public function obtenerDatos()
    {
        // Obtener los datos de las cookies o establecer valores por defecto si no existen las cookies
        $menu = isset($_COOKIE['menu_personalizado']) ? explode(",", $_COOKIE['menu_personalizado']) : self::$menuPorDefecto;
        $fondo = isset($_COOKIE['imagen_fondo']) ? $_COOKIE['imagen_fondo'] : self::$fondoPorDefecto;
        $idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : self::$idiomaPorDefecto;

        // Obtener el mensaje correspondiente al idioma elegido
        $mensajeMostrar = self::$mensajesPorDefecto[$idioma];

        // Devolver los datos que necesita el menú principal en un array asociativo
        return [
            'menu' => $menu,
            'fondo' => $fondo,
            'mensaje' => $mensajeMostrar
        ];
    }
}
