<?php
// Enviar encabezado de tipo de contenido (Content-Type)
header('Content-Type: text/html; charset=UTF-8');

// Enviar encabezado de cacheo (Cache-Control)
header('Cache-Control: no-cache, no-store, must-revalidate');

// Enviar encabezado de control de idioma
header('Content-Language: es, en, fr');



// Establecer una cookie de ejemplo
setcookie('UnaCookie', 'Contendio_enviado', time() + 3600, '/'); // La cookie expira en 1 hora


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icono.jpg" type="image/jpg">
    <title>Encabezados HTTP en PHP</title>
</head>

<body>
    <h1>Ejemplo de Encabezados HTTP con PHP</h1>
    <p>Esta página tiene encabezados HTTP personalizados y una cookie de ejemplo. Revisa las herramientas del navegador para verlos.</p>
    <h2>Pasos para ver los encabezados en el navegador:</h2>
    <ol>
        <li>Abrir la consola de desarrollador en el navegador (clic derecho → Inspeccionar → pestaña Red).</li>
        <li>Recargar la página para capturar la solicitud y respuesta.</li>
        <li>Seleccionar la solicitud correspondiente y ver los Encabezados en la pestaña correspondiente.</li>
        <li>Intalad la extensión en Chrome para visualizar Cookies<br>
            <a href="https://chromewebstore.google.com/detail/cookie-editor/hlkenndednhfkekhgcdicdfddnkalmdm">Editor de Cookies para Chrome</a>
        </li>

    </ol>
</body>

</html>