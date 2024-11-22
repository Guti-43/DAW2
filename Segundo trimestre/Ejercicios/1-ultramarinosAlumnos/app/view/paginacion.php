<div class="paginacion-container">
    <!-- <?php
            // Variables de ejemplo
            //$paginaActual = 3;
            //$totalPaginas = 5;
            ?> -->
    <div class="paginacion">
        <!-- Botón de anterior programarlo -->
        <?php if (true): ?>
            <a href="#" class="boton">Anterior</a>
        <?php else: ?>
            <!-- Debe aparecer deshabilitado si no hay página anterior -->
            <span class="boton disabled">Anterior</span>
        <?php endif; ?>

        <!-- Debe mostrar la primera y la última página     -->
        <span class="paginacion-info">
            Página 1 de Total Páginas
        </span>

        <!-- Botón de siguiente programarlo -->
        <?php if (true): ?>
            <a href="#" class="boton">Siguiente</a>
        <?php else: ?>
            <!-- Debe aparecer deshabilitado si no hay página siguiente -->
            <span class="boton disabled">Siguiente</span>
        <?php endif; ?>
    </div>
</div>