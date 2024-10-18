<?php

require 'controlador/Controlador.php';
require 'modelo/Modelo.php';

$modelo = new Modelo();

$controlador = new Controlador($modelo);
$controlador->manejarSolicitud();