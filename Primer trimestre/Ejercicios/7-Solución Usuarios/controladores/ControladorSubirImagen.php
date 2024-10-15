<?php
class ControladorSubirImagen
{
    public function subirImagenPerfil($nombreUsuario)
    {
        if ($_FILES) {
            $imagenPerfil = $_FILES['imagen_perfil'];
            $nombreUsuario = $_POST['nombre_usuario']; // Obtener el nombre del usuario para nombrar la imagen

            // Validar y mover la imagen a una carpeta específica
            $directorioDestino = 'imagenes_perfil/'; // Carpeta de destino

            // Validar el archivo (tipo de imagen, tamaño, etc.)
            if ($imagenPerfil['error'] === 0) {
                $nombreArchivo = $nombreUsuario . '_perfil.png'; // Nombrar la imagen según el usuario
                $rutaDestino = $directorioDestino . $nombreArchivo;

                // Mover el archivo a la carpeta de destino
                if (move_uploaded_file($imagenPerfil['tmp_name'], $rutaDestino)) {

                    $error = "Imagen de perfil subida exitosamente: $nombreArchivo";
                } else {
                    $error = "Error al mover la imagen.";
                }
            } else {
                $error = "Error al subir la imagen.";
            }
            // Mostrar la vista de presentación con un mensaje de éxito o error
            include 'vistas/login.php';
        }
    }
}
