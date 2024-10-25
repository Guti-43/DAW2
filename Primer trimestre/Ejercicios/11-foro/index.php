<?php
require_once 'controllers/MainController.php';
require_once 'controllers/SessionController.php';

// Crear una instancia del controlador de sesión
$sessionController = new SessionController();

// Crear una instancia del controlador principal
$mainController = new MainController();

// Enrutar la acción según lo que se pase por la URL
$mainController->enrutador();

include 'views/vheader.php';
include 'views/vfooter.php';
