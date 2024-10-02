<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imagenServidor/default.png" type="image/x-icon">
    <title>Productos</title>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h2>Calculadora de Precio Final</h2>
            <!-- Rellena el form -->
            <form action="" method="" enctype="">
                <fieldset>
                    <legend>Datos del Producto</legend>

                    <label for="nombre_producto">Nombre del Producto: </label>
                    <input type="text"><br>

                    <label for="precio_base">Precio Base: </label>
                    <input type="text"><br>

                    <label for="cantidad">Cantidad: </label>
                    <input type="text"><br>

                </fieldset>
                <fieldset>
                    <legend>Operaciones</legend>

                    <fieldset id="operaciones">
                        <legend>Descuento o Recargo</legend>
                        <span id="grupo">
                            <!-- Faltan los valores de los radio buttons -->
                            <label for="descuento">Descuento (10%): </label>
                            <input class="radio-group" type="radio">

                            <label for="recargo"> Recargo (15%): </label>
                            <input class="radio-group" type="radio"><br>
                        </span>
                    </fieldset>

                    <fieldset id="operaciones">
                        <legend>IVA</legend>
                        <span id="grupo">
                            <label for="iva">Aplicar IVA: </label>
                            <select id="iva">
                                <!-- faltan las opciones -->
                            </select>
                        </span>
                    </fieldset>

                </fieldset>
                <fieldset>
                    <legend>Imagen del Producto</legend>
                    <label for="imagen_producto">Imagen del Producto: </label>
                    <!-- Faltan las opciones para subir la imagen -->
                    <input type="file">
                </fieldset>
                <input type="submit" value="Calcular Precio Final">
            </form>
        </div>