<?php
class Agenda
{
    /**
     * @var Contacto[] Array de objetos de tipo Contacto
     */
    private array $contactos;
    private string $rutaUploads;


    public function __construct()
    {
        $this->rutaUploads = 'uploads/';
        $this->contactos = [];
        $this->cargarContactosDesdeSesion();
    }

    private function cargarContactosDesdeSesion(): void
    {
        if (isset($_SESSION['contactos'])) {
            $this->contactos = $_SESSION['contactos'];
        }
    }
    private function guardarContactosEnSesion(): void
    {
        $_SESSION['contactos'] = $this->contactos;
    }


    public function agregarContacto(): ?string
    {
        $errores = [];

        $nombre = isset($_POST['nombre']) ? $this->limpiar($_POST['nombre']) : '';
        $telefono = isset($_POST['telefono']) ? $this->limpiar($_POST['telefono']) : '';
        $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;

        $errores = $this->validarDatos($nombre, $telefono);

        // Si hay errores, los retornamos concatenados en un string
        if (!empty($errores)) {
            return implode(' | ', $errores);
        }

        // Subir la imagen si existe
        $nombreImagen = '';
        if ($imagen && $imagen['name'] && $imagen['error'] == 0) {
            $nombreImagen = $this->subirImagen($imagen['tmp_name'], $nombre);
        }

        // Crear el nuevo contacto
        $contacto = new Contacto($nombre, $telefono, $nombreImagen ? $nombreImagen : '');
        $this->contactos[] = $contacto;
        $this->guardarContactosEnSesion();

        // Retornar null si todo fue correcto
        return null;
    }


    public function eliminarContacto(): string
    {
        $nombre = isset($_POST['nombre']) ? $this->limpiar($_POST['nombre']) : '';
        if (empty($nombre)) {
            $error = "El nombre no puede estar vacío";
        } else {
            $error = "No se encontró contacto con el nombre: $nombre";

            foreach ($this->contactos as $key => $contacto) {
                if ($contacto->getNombre() == $nombre) {
                    $nombreImagen = $contacto->getImagen();
                    $this->eliminarImagen($nombreImagen);
                    unset($this->contactos[$key]);
                    $this->guardarContactosEnSesion();
                    $error = "Contacto con nombre $nombre eliminado";
                }
            }
        }
        return $error;
    }

    public function existeNombre(string $nombre): bool
    {
        foreach ($this->contactos as $contacto) {
            if ($contacto->getNombre() === $nombre) {
                return true;
            }
        }
        return false;
    }

    public function getContactos(): array
    {
        return $this->contactos;
    }

    public function eliminarImagen(string $nombreImagen): void
    {
        $ruta = $this->rutaUploads . $nombreImagen;
        if (file_exists($ruta) && is_file($ruta)) {
            unlink($ruta);
        }
    }

    public function buscarContacto(?string &$error): array
    {
        $resultados = [];
        $nombre = isset($_POST['nombre']) ? $this->limpiar($_POST['nombre']) : '';

        if (empty($nombre)) {
            $error = 'El nombre no puede estar vacío.';
        } else {
            $error = "No se encontraron contactos con el nombre: $nombre.";
            foreach ($this->contactos as $contacto) {
                if (stripos($contacto->getNombre(), $nombre) !== false) {
                    $resultados[] = $contacto;
                    $error = null;
                }
            }
        }
        return $resultados;
    }
    public function modificarContacto(): ?string
    {
        $errores = [];

        // Obtener el índice del contacto seleccionado
        $id = isset($_POST['contactoSeleccionado']) ? $_POST['contactoSeleccionado'] : null;

        // Verificar que se haya seleccionado un contacto
        if ($id === null) {
            return 'Debe seleccionar un contacto';
        }



        // Recupero el nombre actual de la lista de contactos a partir del índice
        $nombreActual = $this->contactos[$id]->getNombre();

        // Obtener los datos del contacto seleccionado, limpiar de espacios y etiquetas HTML
        $nuevoNombre = $this->limpiar($_POST['nuevoNombre'][$id]);
        $nuevoTelefono = $this->limpiar($_POST['nuevoTelefono'][$id]);

        $imagen = $_FILES['imagen']['tmp_name'][$id] ?? null;

        $errores = $this->validarDatos($nuevoNombre, $nuevoTelefono, $nombreActual);

        if ($errores) {
            return implode(' | ', $errores);
        }


        // Búsqueda y modificación del contacto
        foreach ($this->contactos as $contacto) {
            if ($contacto->getNombre() == $nombreActual) {
                $contacto->setNombre($nuevoNombre);
                $contacto->setTelefono($nuevoTelefono);

                // Gestión de la imagen
                if ($imagen) {
                    // Eliminar imagen previa si existe
                    if ($contacto->getImagen()) {
                        $this->eliminarImagen($contacto->getImagen());
                    }
                    // Subir la nueva imagen
                    $nombreImagen = $this->subirImagen($imagen, $nuevoNombre);
                    $contacto->setImagen($nombreImagen);
                }

                // Guardar cambios en $_SESSION
                $this->guardarContactosEnSesion();

                // Mostrar mensaje de éxito
                return 'Contacto modificado correctamente';
            }
        }

        // return 'No se encontró contacto con el nombre actual';
    }
    public function subirImagen($imagen, string $nombreUsuario): string
    {
        $nombreArchivo = '';
        $extensionesPermitidas = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
        $limiteTamaño = 3 * 1024 * 1024; // Límite de 3 MB


        // Obtener tipo MIME y tamaño del archivo
        //var_dump($imagen);
        $tipo = mime_content_type($imagen);
        $tamaño = filesize($imagen);

        if (array_key_exists($tipo, $extensionesPermitidas) && $tamaño <= $limiteTamaño) {
            $extension = $extensionesPermitidas[$tipo];
            $nombreArchivo = $nombreUsuario . '.' .  $extension;

            // Definir la ruta donde se guardará la imagen
            $ruta = $this->rutaUploads . $nombreArchivo;

            // Mover el archivo a la carpeta de destino
            if (!@move_uploaded_file($imagen, $ruta)) {
                $nombreArchivo = '';
            }
        }
        // Si hay algún problema, se retorna un nombre de archivo vacío
        return $nombreArchivo;
    }

    public function limpiar(string $dato): string
    {
        return strtoupper(trim(htmlspecialchars(strip_tags($dato))));
    }

    private function validarDatos(?string $nombre, ?string $telefono, ?string $nombreActual = null): array
    {
        $errores = [];

        // Validar el nombre y comprobar si ya existe       
        if (empty($nombre)) {
            $errores[] = 'El nombre no puede estar vacío';
        } elseif (mb_strlen($nombre) > 20) {
            $errores[] = 'El nombre no puede tener más de 20 caracteres';
        } elseif ($nombre !== $nombreActual && $this->existeNombre($nombre)) {
            $errores[] = 'El contacto ya existe';
        }

        // Validar el teléfono
        if (empty($telefono)) {
            $errores[] = 'El teléfono no puede estar vacío';
        } elseif (strlen($telefono) != 9 || !ctype_digit($telefono)) {
            $errores[] = 'El teléfono debe contener 9 dígitos';
        }
        return $errores;
    }
}
