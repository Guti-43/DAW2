<h2>Usuarios Actuales</h2>
<table>
    <thead>
        <tr>
            <th>Nombre de Usuario</th>
            <th>Contraseña</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario => $contrasena): ?>
            <tr>
                <td><?= htmlspecialchars($usuario); ?></td>
                <td><?= htmlspecialchars($contrasena); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if (!empty($error)): ?>
    <p><?= $error; ?></p>
<?php endif; ?>