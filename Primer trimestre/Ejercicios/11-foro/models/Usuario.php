<?php
// Clase Usuario
include "BaseModelo.php";
class Usuario extends BaseModelo
{
    private string $nombre;
    private string $email;
    private string $contrasena;
    private string $foto;

    public function __construct(int $id, string $nombre, string $email, string $contrasena, string $foto)
    {
        parent::__construct($id);
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->foto = $foto;
    }

    public function registrar(): bool
    {
        // Implementación para registrar un nuevo usuario
        return true;
    }

    public function login(): bool
    {
        // Implementación para iniciar sesión
        return true;
    }

    public function logout(): void
    {
        // Implementación para cerrar sesión
    }

    public function verPerfil(): array
    {
        // Implementación para ver el perfil del usuario
        return [];
    }

    public function actualizarPerfil(string $nombre, string $foto): bool
    {
        // Implementación para actualizar el perfil del usuario
        return true;
    }
}
