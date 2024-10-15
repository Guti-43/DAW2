<?php
require_once 'controladores/ControladorUsuario.php';
require_once 'controladores/ControladorSubirImagen.php';
require_once 'controladores/ControladorPrincipal.php';



// Manejar la solicitud
ControladorPrincipal::manejarSolicitud();
