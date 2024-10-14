<?php
// Mostrar texto directamente en el navegador
echo "Este texto se muestra directamente en el navegador, no he activado el buffer.<br>";
echo "Ahora activo el buffer <code>ob_start()</code><hr>";
// Iniciar el almacenamiento en búfer de salida
ob_start();  // Comenzando a almacenar los datos de salida en el búfer

// Generar contenido que se almacena en el búfer
?>
Bienvenido a mi sitio!
<?php
echo "<br>Este texto se almacena en el búfer.";
// Más salida generada, se almacena en el búfer
echo '<br>Este es otro texto en el búfer y que con <code>ob_get_clean()</code> límpio el buffer y guardo su contenido en la variable $content.';
echo '<br>Si quiero mostrar las frases desde que activé el buffer debo hacer <code>echo</code> de la variable <code>$content</code><br><hr>';


// Recuperar el contenido del búfer y para enviarlo al navegador
$content = ob_get_clean();
echo $content;

// Mostrar el contenido del búfer
echo "Esta frase está después de limpiar el buffer y la mostrará <code>ob_flush y flush()</code><hr>";
ob_flush(); // Vaciar el búfer de salida
flush(); // Enviar el contenido parcial del búfer al navegador


// Pausar la ejecución del script durante 5 segundos
sleep(5);

// Generar más contenido después de vaciar el buffer y dormir 5 segundos el script
echo "Este texto se muestra al cerrar el buffer y pasados 5 segundos porque hay un <code>sleep(5)</code> ";
echo "<br>Si hay algún contenido almacenado en el búfer de salida, <code>ob_end_flush()</code> lo envía al navegador y cierra el buffer.";
// Cerrar el búfer
ob_end_flush();

?>
