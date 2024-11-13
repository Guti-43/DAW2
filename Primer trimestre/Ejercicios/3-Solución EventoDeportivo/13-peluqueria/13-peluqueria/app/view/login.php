<div class="login-container">
    <?php $error = NULL ?>
    <h2>Login</h2>
    <form action="index.php?controlador=session&accion=login" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email">
        </div>

        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" placeholder="contraseña">
        </div>

        <div class="form-group">
            <button type="submit">Iniciar Sesión</button>
        </div>
    </form>
    <?= $error ? '<div class="error">' . $error . '</div>' : '' ?>
</div>