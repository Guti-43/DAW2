<?php
include "controlador/ControladorAgencia.php";



//Rutas a imágenes
$imagenParis = 'https://st5.depositphotos.com/1038919/65785/i/380/depositphotos_657854422-stock-photo-paris-eiffel-tower-river-seine.jpg';
$imagenTokio = 'https://img.freepik.com/foto-gratis/paisaje-urbano-tokio-dia_23-2149209915.jpg?size=626&ext=jpg&ga=GA1.1.672697106.1719187200&semt=ais_user';


// Ejemplo de uso
$controlador = new ControladorAgencia();

// Agregar Viajes
$controlador->agregarViaje(new Viaje('Paris', 'Viaje romántico a París', 200, $imagenParis));
$controlador->agregarViaje(new Viaje('Tokio', 'Exploración cultural en Tokio', 300, $imagenTokio));

// Agregar Empleados
$controlador->agregarEmpleado(new Empleado('Carlos García', 'carlos@agenciaviajes.com', 'Gerente'));
$controlador->agregarEmpleado(new Empleado('Ana Pérez', 'ana@agenciaviajes.com', 'Asesora de viajes'));

// Agregar Usuarios
$controlador->agregarUsuario(new Usuario('Lucía Gómez', 'lucia@cliente.com', 'VIP'));
$controlador->agregarUsuario(new Usuario('Miguel Torres', 'miguel@cliente.com', 'Regular'));

//Agregregar un nuevo Empleado
$empleado = new Empleado('Juan Pérez', 'perez@agenciaviajes.com', 'Asesor de viajes');
//echo $empleado->mostrarInformacion();
$controlador->agregarEmpleado($empleado);

// Mostrar información
$dias = 5; // Por ejemplo, el usuario quiere saber el costo por 5 días
// Ejemplo de cómo llamar al método para mostrar diferentes secciones
$controlador->mostrarInformacion('viajes', $dias); // Mostrar solo viajes
$controlador->mostrarInformacion('empleados'); // Mostrar solo empleados
$controlador->mostrarInformacion('usuarios'); // Mostrar solo usuarios