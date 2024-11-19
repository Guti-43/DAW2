<div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form action="?controlador=session&accion=login" method="POST">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre de usuario">

        <label for="contrasena">Contraseña:</label>
        <input type="contrasena" id="password" name="contrasena" placeholder="Contraseña">

        <button type="submit">Iniciar Sesión</button>
        <?= $error ? '<div class="error">' . $error . '</div>' : '' ?>
    </form>

</div>