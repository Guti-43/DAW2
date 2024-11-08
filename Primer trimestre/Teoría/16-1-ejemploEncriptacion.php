<?php

// Definir una contraseña para realizar pruebas
// Esta contraseña solo la conocerá el usuario, nunca se guardará en un BD
// Esta contraseña será la que introduzca el usuario en el formulario de login
// La aplicación nunca prodrá recuperar la contraseña original
$password = "secreto123";

// Crear el hash de la contraseña usando password_hash()
$hash = password_hash($password, PASSWORD_DEFAULT);

// Mostrar el hash generado, este se guardará en la base de datos.
// NUNCA GUARDAR LA CONTRASEÑA EN TEXTO PLANO, SIEMPRE GUARDAR EL HASH
echo "El hash generado es: " . $hash . "<br>";

// Simulando el proceso de verificar la contraseña ingresada por el usuario
$usuario_ingresa_password = "secreto123"; // Contraseña correcta
$usuario_ingresa_password_erronea = "incorrecto123"; // Contraseña incorrecta

// Verificar si la contraseña ingresada por el usuario coincide con el hash
// Esta función devuelve true si la contraseña es correcta, de lo contrario devuelve false
// Nunca devuelve ni el hash ni la contraseña original
$verificacion1 = password_verify($usuario_ingresa_password, $hash);
$verificacion2 = password_verify($usuario_ingresa_password_erronea, $hash);

// Mostrar los resultados de las verificaciones
echo "Verificación con contraseña correcta: " . ($verificacion1 ? 'Correcta' : 'Incorrecta') . "<br>";
echo "Verificación con contraseña incorrecta: " . ($verificacion2 ? 'Correcta' : 'Incorrecta') . "<br>";
