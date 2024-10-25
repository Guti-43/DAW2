<main class="contenido-principal">
    <h2><?php  ?></h2>
    <p><?php ?></p>
    <p>Autor: ?></p>
    <p>Votos Positivos: <?php  ?></p>
    <p>Votos Negativos: <?php  ?></p>

    <h3>Comentarios</h3>
    <div class="comentarios">
        <!-- <?php if (true): ?>  Cambiar por la condición correcta -->
        <ul>
            <?php 'Recorrer el array de comentarios de un tema' ?>
            <li>
                <strong><?php 'Nombre el usuario'; ?>:</strong>
                <p><?php 'contenido del comentario' ?></p>
                <span><?php 'fecha de creación' ?></span>
            </li>
            <?php 'fin' ?>
        </ul>
    <?php else: ?>
        <p>No hay comentarios para este tema.</p>
    <?php endif; ?>
    </div>
</main>