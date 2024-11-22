<div class="container-articulos">
    <h1>Artículos </h1>
    <?= $error ? '<div class="error2">' . $error . '</div>' : '' ?>
    <div class="articles-container">

        <?php foreach ($articulos as $articulo): ?>
            <div class="article">
                <figure>
                    <img src="<?= Config::$rutaArticulo . htmlspecialchars($articulo['imagen']); ?>" alt="Producto">
                    <figcaption><?= htmlspecialchars($articulo['nombre']); ?></figcaption>
                </figure>
                <div class="editable-fields">
                    <div>
                        <span class="label">Precio:</span>
                        <span class="dato precio"><?= htmlspecialchars($articulo['precio']); ?> €</span>
                    </div>
                    <div>
                        <span class="label">Cantidad:</span>
                        <span class="dato cantidad"><?= htmlspecialchars($articulo['cantidad']); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>