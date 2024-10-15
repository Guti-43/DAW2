<?php
include 'modelos/Usuario.php';
include 'modelos/Password.php';
include 'modelos/UsuarioRegular.php';
include 'modelos/UsuarioAdmin.php';

class ControladorUsuario
{
    // Método para iniciar sesión
    public function iniciarSesion()
    {
        if ($_POST) {
            $nombreUsuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];

            // Validar credenciales
            if ($this->validarCredenciales($nombreUsuario, $contrasena)) {


                if ($nombreUsuario == 'admin') {
                    $usuario = new UsuarioAdmin($nombreUsuario, $contrasena);
                } else {
                    $usuario = new UsuarioRegular($nombreUsuario, $contrasena);
                }

                self::mostrarVistaPresentacion($usuario);
            } else {
                $error = "Credenciales incorrectas.";
                include 'vistas/login.php'; // Mostrar el formulario de inicio de sesión con un mensaje de error
            }
        }
    }

    // Método para añadir un nuevo usuario
    public function anadirUsuario()
    {
        $error = '';

        if ($_POST) {
            $nombreUsuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];

            // Comprobar si el usuario ya existe
            if (Password::existeUsuario($nombreUsuario)) {
                $error = "El usuario ya existe."; // Mensaje de error
            } else {
                // Añadir el nuevo usuario
                if (Password::anadirUsuario($nombreUsuario, $contrasena)) {
                    $error = "Usuario añadido exitosamente: $nombreUsuario"; // Mensaje de éxito
                } else {
                    $error = "Error al añadir el usuario."; // Mensaje de error genérico
                }
            }
        }

        // Obtener la lista de usuarios actuales
        $usuarios = Password::obtenerCredenciales();

        //Creo un nuevo usuario admin para poder mostrar la vista de presentación
        //Al enviar el formulario se recarga la página y se pierden los datos
        //HTTP es un protocolo sin estado:
        //Lo que significa que cada solicitud que se realiza desde un cliente (un navegador) a un servidor (Apache) y no tiene conocimiento de las solicitudes anteriores.
        // El servidor no mantiene ninguna información sobre las solicitudes anteriores del cliente.
        $usuario = new UsuarioAdmin('admin', 'admin123');

        // Incluir la vista con el formulario y la tabla de usuarios
        include 'vistas/presentacionAdmin.php';
    }

    // Método para validar credenciales
    private function validarCredenciales($nombreUsuario, $contrasena)
    {
        // Aquí se utilizan las credenciales definidas en la clase Password
        return Password::validar($nombreUsuario, $contrasena);
    }
    // Método para mostrar el formulario de inicio de sesión
    public function mostrarFormulario()
    {
        include 'vistas/login.php'; // Incluye la vista del formulario de login
    }
    // Método para mostrar la vista de presentación
    public static function mostrarVistaPresentacion($usuario)
    {
        // Aquí puedes incluir el código para mostrar la vista de presentación
        if ($usuario->obtenerRol() == 'Admin') {
            include 'vistas/presentacionAdmin.php';
        } else {
            include 'vistas/presentacionUsuario.php';
        }
    }
}
