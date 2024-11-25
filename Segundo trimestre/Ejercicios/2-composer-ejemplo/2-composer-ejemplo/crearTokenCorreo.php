<?php
// Con este código debéis crear un método de clase que se pueda llamar desde cualquier parte de la aplicación
// Dirección de correo del usuario que se va a verificar

$correo = 'usuario@example.com';

// Hashear el correo usando password_hash()
$hash_correo = password_hash($correo, PASSWORD_DEFAULT);

// Mostrar el hash generado
echo "El hash del correo $correo es: $hash_correo <br>";


//$enlace = 'http://tusitio.com/index.php?ctl=verificar&correo=' . urlencode($correo) . '&hash=' . urlencode($hash_correo);

// Generar el enlace con el hash para enviar al usuario
// Lo envío por GET para que el usuario pueda hacer clic en el enlace y verificar su correo, al archivo index1.php
$enlaceGenerico = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/index1.php?ctl=verificar&correo=' . urlencode($correo) . '&hash=' . urlencode($hash_correo);
echo "<br>";
echo "Enlace para el correo del usuario: <a href='$enlaceGenerico'>$enlaceGenerico</a><br>";

// La función urlencode() en PHP se utiliza para codificar una cadena de texto
// de manera que sea seguro su envío en una URL. 
// Esta función convierte caracteres especiales en su representación válida para una URL,
// de manera que puedan ser transmitidos correctamente mediante la web.
// Por ejemplo, el espacio en blanco se convierte en %20
