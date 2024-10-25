<div class="contenido-principal">
    <h2>Iniciar Sesión</h2>
    <form action="index.php?accion=iniciarSesion" method="POST" class="form">
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena">
        </div>
        <div class="form-group">
            <button type="submit">Iniciar Sesión</button>
        </div>
        <p class="error">Error si existe</p>
    </form>
</div>