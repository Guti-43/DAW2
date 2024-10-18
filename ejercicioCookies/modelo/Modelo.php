<?php
class Modelo {
    private $idioma;
    private $fondo;
    private $menu;
    private $mensajes = [
        'es' => 'Bienvenido a la página principal',
        'en' => 'Welcome to the main page',
        'fr' => 'Bienvenue sur la page principale'
    ];

    public function __construct() {
        // Idioma por defecto o leer de la cookie
        $this->idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es';
        
        // Fondo por defecto o leer de la cookie
        $this->fondo = isset($_COOKIE['fondo']) ? $_COOKIE['fondo'] : 'img/fondo1.jpg';

        // Menú por defecto o leer de la cookie
        $this->menu = isset($_COOKIE['menu']) ? json_decode($_COOKIE['menu'], true) : ['Inicio', 'Contacto'];
    }

    public function getIdioma() {
        return $this->idioma;
    }

    public function setIdioma($idioma) {
        $this->idioma = $idioma;
    }

    public function getFondo() {
        return $this->fondo;
    }

    public function setFondo($fondo) {
        $this->fondo = $fondo;
    }

    public function getMenu() {
        return $this->menu;
    }

    public function setMenu($menu) {
        $this->menu = $menu;
    }

    public function getMensajeBienvenida() {
        return $this->mensajes[$this->idioma];
    }
}
