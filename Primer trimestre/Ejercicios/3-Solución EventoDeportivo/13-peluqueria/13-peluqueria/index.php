<?php
require_once __DIR__ . '/config/autoloadP.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// $frontController = new FrontController;
// $frontController->manejarPeticion();


//Pruebas

// $_SESSION['usuario'] = [
//     'id' => 1,
//     'nombre' => 'pepito',
//     'avatar' => 'uploads/img/avatar/avatar3.png'
// ];
include_once 'app/view/header.php';
// include_once 'app/view/login.php';
include_once 'app/view/central.php';
//include_once 'app/view/calendario.php';
include_once 'app/view/footer.php';
