<div class="containerMensajes">
    <h2>Mensajes de Intercambio</h2>
    <?php
    foreach ($mensajeMostrar as $mensaje) { ?>
        <div class='mensaje'>
            <p><?= $mensaje ?></p>
        </div>
    <?php } ?>
    <?= $error ? '<div class="error">' . $error . '</div>' : '' ?>
</div>