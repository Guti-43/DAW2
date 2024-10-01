<h2>Ficha del Evento Deportivo</h2>
<table class="ficha-evento">
    <tr>
        <th>Nombre del Evento</th>
        <td><?= $nombre_evento ?></td>
    </tr>
    <tr>
        <th>Fecha</th>
        <td><?= $fecha; ?></td>
    </tr>
    <tr>
        <th>Ubicación</th>
        <td><?= $ubicacion; ?></td>
    </tr>
    <tr>
        <th>Deportes</th>
        <td><?= implode(", ", $deportes); ?></td>
    </tr>
    <tr>
        <th>Imagen</th>
        <td><img src="<?= $rutaArchivo; ?>" alt="Imagen del evento"></td>
</table>
</body>

</html>