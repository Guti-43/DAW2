<div class="container-articulos">
    <h1>Mis Artículos</h1>
    <?= $error ? '<div class="error2">' . $error . '</div>' : '' ?>
    <div class="articles-container">

        <?php foreach ($articulos as $articulo): ?>
            <div class="article">
                <figure>
                    <img src="<?= Config::$rutaArticulo . htmlspecialchars($articulo['imagen']); ?>" alt="Producto" class="product-image">
                    <figcaption><?= htmlspecialchars($articulo['nombre']); ?></figcaption>
                </figure>
                <div class="editable-fields">
                    <form action="?controlador=articulo&accion=actualizar" method="POST">
                        <input type="hidden" name="idArticulo" value="<?= $articulo['id']; ?>">
                        <div>
                            <label>
                                Disponible
                            </label>
                            <input type="checkbox" name="disponible" <?= $articulo['disponible'] ? 'checked' : ''; ?>>
                        </div>
                        <div>
                            <label>
                                Puntos:
                            </label>
                            <input type="number" name="puntos" value="<?= htmlspecialchars($articulo['puntos']); ?>">
                        </div>
                        <div>
                            <input type="submit" value="Actualizar">
                        </div>
                    </form>
                </div>
                <details>
                    <summary>Descripción</summary>
                    <p><?= htmlspecialchars($articulo['descripcion']); ?></p>
                </details>
            </div>
        <?php endforeach; ?>
    </div>
</div>