<?php
class ControladorSubirImagen
{
    public function subirImagenPerfil($nombreUsuario)
    {
        if ($_FILES) {
            $imagenPerfil = $_FILES['imagen_perfil'];
            $nombreUsuario = htmlspecialchars($_POST['nombre_usuario']); // Obtener el nombre del usuario para nombrar la imagen


            // Validar y mover la imagen a una carpeta específica
            $directorioDestino = 'imagenes_perfil/'; // Carpeta de destino

            // Validar el archivo (tipo de imagen, tamaño, etc.)
            if ($imagenPerfil['error'] === 0) {
                $nombreArchivo = $nombreUsuario . '_perfil.png'; // Nombrar la imagen según el usuario
                $rutaDestino = $directorioDestino . $nombreArchivo;
                $tipoContenido = mime_content_type($imagenPerfil['tmp_name']);
                $tamañoArchivo = $imagenPerfil['size'];

                // Comprobar que el archivo es un PNG y que su tamaño es menor de 3 MB
                if ($tipoContenido === 'image/png' && $tamañoArchivo <= 3 * 1024 * 1024) {
                    // Mover el archivo a la carpeta de destino
                    if (@move_uploaded_file($imagenPerfil['tmp_name'], $rutaDestino)) {
                        $error = "Imagen de perfil subida exitosamente: $nombreArchivo";
                    } else {
                        $error = "Error al mover la imagen.";
                    }
                } else {
                    $error = "El archivo debe ser una imagen PNG y menor de 3 MB.";
                }
            } else {
                $error = "Error al subir la imagen.";
            }
            // Mostrar la vista de presentación con un mensaje de éxito o error
            $nombre = $nombreUsuario;
            include 'vistas/presentacionUsuario.php';
        }
    }
}
