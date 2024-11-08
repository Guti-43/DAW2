<?php

echo "<br>Estoy en el index de index.php";
echo "<br>El valor de la variable __DIR__ es: " . __DIR__;
echo "<br><br>";

require_once __DIR__ . '/config/miAutoload.php';




echo "<hr><br>Estoy en el index de index.php después de require_once";
echo "<br>Ya puedo acceder a todas las clases sin necesidad de require_once";
echo "<br>Puedo acceder al contenido de Configuración de la base de datos<br>";


echo "<hr><br><br><br>El nombre de la base de datos es: " . Config::$database;

echo "<br>La ruta a las imágenes para maquetar: " . Config::$rutaImg;

echo "<br>La ruta a las imágenes del avatar usuario es: " . Config::$rutaAvatar;



echo "<hr><br>Puedo acceder a todos los controladores y modelos sin necesidad de require_once<br>";

$frontController = new FrontController;
$frontController->index();


$usuarioController = new UsuarioController;
$usuarioController->index();

$baseDatos = new BaseDatos;
$baseDatos->index();
