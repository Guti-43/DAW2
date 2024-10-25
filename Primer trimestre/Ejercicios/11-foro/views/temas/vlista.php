<main class="contenido-principal">
    <h2>Lista de Temas</h2>
    <table class="temas-tabla">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Autor</th>
                <th>Votos Positivos</th>
                <th>Votos Negativos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 'Recorrer el array de temas' ?>
            <tr>
                <td>Título</td>
                <td>Descripción</td>
                <td>Autor</td>
                <td>Votos Positivos</td>
                <td>Votos Negativos</td>
                <td>
                    <a href="#">Ver Comentarios</a> |
                    <a href="#">Añadir Comentario</a> |
                    <a href="#">Votar +</a> |
                    <a href="#">Votar -</a>
                </td>
            </tr>
            <?php 'fin' ?>
        </tbody>
    </table>
</main>