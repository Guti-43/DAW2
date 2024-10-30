<?php
class SessionController
{
    public function index()
    {
        //Verificar si el usuario ha iniciado sesión.
        //Si el usuario ha iniciado sesión, redirigirlo a la página de inicio de usuarios.
        //Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión.
    }

    public function login()
    {
        //Procesar el formulario de inicio de sesión.
        //Verificar las credenciales del usuario (nombre de usuario y contraseña) en la BD. Debe llamar al modelo..
        //Si las credenciales son correctas, para ello debe llamar al modelo
        // iniciar la sesión y almacenar los datos del usuario en la sesión (por ejemplo, $_SESSION['usuario_id']).
        //Redirigir al usuario a la página de inicio de usuarios.
        //Si las credenciales son incorrectas, mostrar un mensaje de error y permitir que el usuario intente iniciar sesión nuevamente.
    }

    public function logout()
    {
        // Lógica para cerrar la sesión
    }
}
