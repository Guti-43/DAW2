<?php
class Password
{
    // Variable estática que almacena los usuarios y contraseñas
    private static $credenciales = [
        'admin' => 'admin123',
        'user' => 'user123',
        'pepe' => 'pepe123',
        'juan' => 'juan123'
    ];

    // Método estático para obtener las credenciales
    public static function obtenerCredenciales()
    {
        return self::$credenciales;
    }

    // Método estático para validar las credenciales
    public static function validar($nombreUsuario, $contrasena)
    {
        if (!isset(self::$credenciales[$nombreUsuario]) || self::$credenciales[$nombreUsuario] !== $contrasena) {
            return false;
        } else {
            return true;
        }
    }
    // Método estático para comprobar si un usuario ya existe
    public static function existeUsuario($nombreUsuario)
    {
        return isset(self::$credenciales[$nombreUsuario]);
    }
    // Método estático para añadir nuevas credenciales
    public static function anadirUsuario($nombreUsuario, $contrasena)
    {
        $resultado = false;

        if (!isset(self::$credenciales[$nombreUsuario])) {
            self::$credenciales[$nombreUsuario] = $contrasena;
            $resultado = true;
        }

        return $resultado;
    }
}
