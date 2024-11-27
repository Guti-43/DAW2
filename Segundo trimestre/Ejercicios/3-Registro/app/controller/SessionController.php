<?php
class SessionController
{
    public function index() {}

    public function login() {}

    private function datosUsuario($usuario)
    {
        $_SESSION['id'] = $usuario->id;
        $_SESSION['sid'] = session_id();
        $_SESSION['rol'] = $usuario->rol;
        $_SESSION['nombre'] = $usuario->nombre;
        $_SESSION['email'] = $usuario->email;
        $_SESSION['imagen'] = isset($usuario->imagen) ? Config::$rutaAvatar . $usuario->imagen : Config::$rutaImg . 'avartar_default.png';
    }

    public static function logout()
    {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
        header("Location:index.php");
        exit();
    }

    public static function validarSesion()
    {
        $sesionValida = isset($_SESSION['id']) && $_SESSION['sid'] === session_id();
        if (!$sesionValida)  self::logout();
        return $sesionValida;
    }

    private function limpiar($input)
    {
        return is_array($input)
            ? array_map([$this, 'limpiar'], $input)
            : (htmlspecialchars(trim(strip_tags($input))) ?? null);
    }
}
