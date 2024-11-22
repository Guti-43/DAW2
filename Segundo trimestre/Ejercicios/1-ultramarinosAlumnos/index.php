<?php
require_once __DIR__ . '/config/autoloadP.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$frontController = new FrontController;
$frontController->manejarPeticion();
