<?php
class Usuario
{
    protected $nombre;
    protected $contrasena;
    protected $imagenPerfil;

    public function __construct($nombre, $contrasena)
    {
        $this->nombre = $nombre;
        $this->contrasena = $contrasena;
        $this->imagenPerfil = 'imagenes_perfil/default_user.png'; // Imagen por defecto
    }

    // Método para obtener el nombre del usuario
    public function obtenerNombre()
    {
        return $this->nombre;
    }

    // Método para obtener el rol del usuario (se puede sobrescribir en clases derivadas)
    public function obtenerRol()
    {
        return "Usuario"; // Valor por defecto
    }

    // Método para obtener la imagen de perfil
    public function obtenerImagenPerfil()
    {
        return $this->imagenPerfil;
    }

    // Método para establecer la imagen de perfil
    public function establecerImagenPerfil($rutaImagen)
    {
        $this->imagenPerfil = $rutaImagen;
    }
}
