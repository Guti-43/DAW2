<?php
// Verificar si el parámetro 'n' no está establecido en la URL
if (!isset($_GET['n'])) {
    // Si no está establecido, inicializar 'n' a 10
    $n = 10;
    $_GET['n'] = 10;
} else {
    // Si está establecido, asignar el valor de 'n' desde la URL
    $n = $_GET['n'];
}

// Verificar si 'n' es mayor que 0
if ($n > 0) {
    // Enviar un encabezado HTTP para refrescar la página cada 3 segundos
    // y decrementar el valor de 'n' en 1
    header('Refresh:2;url=' . $_SERVER['PHP_SELF'] . '?n=' . ($n - 1));

    // Mostrar el valor actual del contador
    echo "<br><center><h1>Valor del contador: " . $_GET['n'] . "</h1></center>";
} else {
    // Si 'n' es 0 o menor, mostrar el mensaje de fin del contador
    echo "<br><center><h1>FIN del contador</h1></center>";
}
