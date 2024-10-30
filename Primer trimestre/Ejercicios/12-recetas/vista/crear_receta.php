<?php include 'header.php'; ?>
<?php include 'perfil.php'; ?>
<h2>Crear Nueva Receta</h2>

<form action="#" method="POST">
    <div>
        <label for="nombre_receta">Nombre de la Receta:</label>
        <input type="text" name="nombre_receta" id="nombre_receta" required>
    </div>

    <div>
        <label for="ingredientes">Ingredientes:</label>
        <textarea name="ingredientes" id="ingredientes" required></textarea>
    </div>

    <div>
        <label for="tiempo_preparacion">Tiempo de Preparación (minutos):</label>
        <input type="number" name="tiempo_preparacion" id="tiempo_preparacion" required>
    </div>

    <div>
        <label for="dificultad">Dificultad:</label>
        <select name="dificultad" id="dificultad" required>
            <option value="fácil">Fácil</option>
            <option value="media">Media</option>
            <option value="difícil">Difícil</option>
        </select>
    </div>

    <button type="submit">Guardar Receta</button>
</form>


<?php include 'footer.php'; ?>