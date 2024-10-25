<?php
class SessionController
{
    private int $tiempoInactividad = 1800; // Tiempo de inactividad en segundos (30 minutos)
    private array $usuarios = []; // Lista de usuarios registrados, inicializada con algunos usuarios de prueba


    public function __construct()
    {
        $this->cargarUsuariosIniciales();
    }

    private function cargarUsuariosIniciales(): void
    {
        $this->usuarios[] = new Usuario(1, "Juan Pérez", "juan@example.com", "juan", "assets/img/juan.jpg");
        $this->usuarios[] = new Usuario(2, "Marta Gómez", "marta@example.com", "marta", "assets/img/marta.jpg");
        $this->usuarios[] = new Usuario(3, "Carlos López", "carlos@example.com", "carlos", "assets/img/carlos.jpg");
    }
    /**
     * Verifica si el usuario está autenticado.
     * Retorna true si el usuario ha iniciado sesión, de lo contrario false.
     */
    public function usuarioAutenticado(): bool
    {
        // Comprobar si existe la variable de sesión del usuario
        return true;
    }

    /**
     * Carga la vista de inicio de sesión.
     * Se llamará cuando el usuario no esté autenticado y necesite iniciar sesión.
     */
    public function cargarLogin(): void
    {
        // Incluir la vista de login
    }

    /**
     * Verifica si ha pasado el tiempo de inactividad.
     * Retorna true si el tiempo de inactividad ha superado el límite, de lo contrario false.
     */
    private function verificarInactividad(): bool
    {
        // Comparar la última actividad del usuario con el tiempo de inactividad
        return true;
    }

    /**
     * Cierra la sesión del usuario.
     * Destruye la sesión y redirige al usuario a la página de inicio de sesión.
     */
    public function cerrarSesion(): void
    {
        // Destruir la sesión y redirigir a la página de login
    }
    /**
     * Inicia sesión de un usuario.
     * Valida las credenciales y establece la sesión del usuario.
     */
    public function iniciarSesion(string $email, string $contrasena): bool
    {
        // Validar las credenciales del usuario
        // Si las credenciales son válidas, establecer la sesión 
        return false;
    }

    /**
     * Muestra el perfil del usuario autenticado.
     */
    public function verPerfil(): array
    {

        return [];
    }

    /**
     * Actualiza el perfil del usuario, incluyendo el nombre y la foto.
     */
    public function actualizarPerfil(string $nombre, string $foto): bool
    {
        // Actualizar el perfil del usuario
        return false;
    }
}
