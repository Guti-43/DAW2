<div class="container-articulos vista-ancha">
    <div class="container-articulos">
        <h1>Artículos Disponibles</h1>
        <?= $error ? '<div class="error2">' . $error . '</div>' : '' ?>
        <?php if (!empty($articulos)): ?>
            <div class="container-articulos vista-editable">
                <div class="articles-container">
                    <?php foreach ($articulos as $articulo): ?>
                        <div class="article">
                            <figure>
                                <img src="<?= Config::$rutaArticulo . htmlspecialchars($articulo['imagen']); ?>" alt="Producto" class="product-image">
                                <figcaption><?= htmlspecialchars($articulo['nombre']); ?></figcaption>
                            </figure>

                            <div class="editable-fields">
                                <form action="?controlador=articulo&accion=realizarIntercambio" method="POST">
                                    <input type="hidden" name="idTrueque" value="<?= $articulo['id']; ?>">
                                    <div>
                                        <label>
                                            Puntos: <?= htmlspecialchars($articulo['puntos']) ?>
                                        </label>
                                    </div>
                                    <div>
                                        <label>
                                            Trueque:
                                        </label>
                                        <select name="miArticulo">
                                            <option disabled selected>Elige uno de tus artículos para trueque</option>
                                            <?php foreach ($misArticulos as $miArticulo): ?>
                                                <option value="<?= $miArticulo['id']; ?>">
                                                    <?= htmlspecialchars($miArticulo['nombre']) . ' (' . htmlspecialchars($miArticulo['puntos']) . ' puntos)'; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <input type="submit" value="Intercambiar">
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
        <?php endif; ?>
    </div>
</div>