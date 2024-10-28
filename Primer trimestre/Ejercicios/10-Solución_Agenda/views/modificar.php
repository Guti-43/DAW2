<div class="modificar">
    <h2>Modificar Contacto</h2>
    <form action="index.php?accion=modificar" method="POST" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th>Seleccionar</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $index => $contacto): ?>
                    <tr>
                        <td>
                            <input type="radio" name="contactoSeleccionado" value="<?= $index ?>">
                        </td>
                        <td>
                            <input type="text" name="nuevoNombre[<?= $index ?>]" value="<?= $contacto['nombre'] ?>" placeholder="Nuevo Nombre">
                        </td>
                        <td>
                            <input type="text" name="nuevoTelefono[<?= $index ?>]" value="<?= $contacto['telefono'] ?>" placeholder="Nuevo Teléfono">
                        </td>
                        <td>
                            <div class="imagen-contenedor">
                                <img src="<?= $contacto['imagen'] ? 'uploads/' . $contacto['imagen'] : 'assets/images/icono.png' ?>">
                                <input type="file" name="imagen[<?= $index ?>]">
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <input type="submit" value="Modificar">
    </form>
    <?= $error ? '<p class="error">' . $error . '</p>' : '' ?>
</div>