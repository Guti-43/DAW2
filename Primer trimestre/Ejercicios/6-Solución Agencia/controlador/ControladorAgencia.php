<?php
require_once 'Viaje.php';
require_once 'Empleado.php';
require_once 'Usuario.php';

class ControladorAgencia
{
    private array $viajes = [];
    private array $empleados = [];
    private array $usuarios = [];

    public function agregarViaje(Viaje $viaje): void
    {
        $this->viajes[] = $viaje;
    }

    public function agregarEmpleado(Empleado $empleado): void
    {
        $this->empleados[] = $empleado;
    }

    public function agregarUsuario(Usuario $usuario): void
    {
        $this->usuarios[] = $usuario;
    }

    public function mostrarInformacion(string $tipo, ?int $dias = null): void
    {
        // Validar el tipo de información
        if (!in_array($tipo, ['viajes', 'empleados', 'usuarios'])) {
            throw new InvalidArgumentException('Tipo de información no válido. Debe ser "viajes", "empleados" o "usuarios".');
        }

        // Pasar la información a la vista
        $viajes = $this->viajes;
        $empleados = $this->empleados;
        $usuarios = $this->usuarios;

        include 'vista/vista.php'; // Incluimos el archivo de vista
    }
}
