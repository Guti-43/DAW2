<?php
class SessionController
{
    public function index()
    {
        if (isset($_SESSION['idusuario'])) {
            UsuarioController::index();
        } else {
            $accion = $_REQUEST['accion'] ?? 'home';
            $this->mostrarLogin($accion);
        }
    }
    private static function mostrarLogin($accion = NULL, $error = '')
    {
        $vista = ($accion === 'formulario') ? "app/view/login.php" : "app/view/home.php";
        require_once "app/view/header.php";
        require_once $vista;
        require_once "app/view/footer.php";
    }
    public function login()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = $this->limpiar($_POST);
            $usuario = Usuario::validarCredenciales($_POST['nombre'], $_POST['contrasena']);
            if ($usuario) {
                $this->datosUsuario($usuario);
                UsuarioController::index();
                return;
            } else {
                $error = "Credenciales incorrectas. Inténtalo de nuevo.";
            }
        }
        $this->mostrarLogin('formulario', $error);
    }

    private function datosUsuario($usuario)
    {
        $_SESSION['idusuario'] = $usuario->id;
        $_SESSION['sid'] = session_id();
        $_SESSION['rol'] = $usuario->rol;
        $_SESSION['nombre'] = $usuario->nombre;
        $_SESSION['foto'] = isset($usuario->foto) ? Config::$rutaAvatar . $usuario->foto : Config::$rutaImg . 'usuario_default.png';
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
        $sesionValida = isset($_SESSION['idusuario']) && $_SESSION['sid'] === session_id();
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
