<?php
include "EnviarCorreo.php";
include "GenerarPDF.php";
require 'vendor/autoload.php';



// Enviar un correo electrónico
echo EnviarCorreo::enviarCorreo('destinatario@example.com', 'Asunto de prueba', '<h1>Mensaje HTML</h1>');

// Generar un PDF
echo GenerarPDF::crearPDF('<h1>Contenido del PDF</h1>', 'documento_ejemplo');
