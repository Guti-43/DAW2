    <div class="resultados">
        <h3>Resultados</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $contacto): ?>
                    <tr>
                        <td><?= $contacto['nombre']; ?></td>
                        <td><?= $contacto['telefono']; ?></td>
                        <td>
                            <img src="<?= $contacto['imagen'] ? 'uploads/' . $contacto['imagen'] : 'assets/images/icono.png' ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>