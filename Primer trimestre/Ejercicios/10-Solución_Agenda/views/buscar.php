<div class="buscar">
    <h2>Buscar Contacto</h2>
    <form action="index.php?accion=buscar" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del contacto">
        <input type="submit" value="Buscar">
    </form>
    <?php if ($contactos):
        include 'views/resultados.php';
    endif; ?>
    <?= $error ? '<p class="error">' . $error . '</p>' : '';
    ?>
</div>