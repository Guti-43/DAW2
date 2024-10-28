<div class="eliminar">
    <h2>Eliminar Contacto</h2>

    <form action="index.php?accion=eliminarContacto" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del contacto">
        <button type="submit">Eliminar</button>
    </form>

    <?= $error ? '<p class="error">' . $error . '</p>' : '' ?>
</div>