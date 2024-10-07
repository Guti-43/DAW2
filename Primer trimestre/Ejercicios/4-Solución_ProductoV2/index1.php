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
            <form action="calculo.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Datos del Producto</legend>

                    <label for="nombre_producto">Nombre del Producto: </label>
                    <input type="text" id="nombre_producto" name="nombre_producto" value="<?= $nombreProducto ?? '' ?>" placeholder="Nombre del producto: longitud máxima 50 caracteres"><br>

                    <label for="precio_base">Precio Base: </label>
                    <input type="text" id="precio_base" name="precio_base" value="<?= $precioBase ?? '' ?>" placeholder="Precio base valor: entero o decimal entre 1 y 2000"><br>

                    <label for="cantidad">Cantidad: </label>
                    <input type="text" id="cantidad" name="cantidad" value="<?= $cantidad ?? '' ?>" placeholder="Cantidad: valor entero entre 1 y 100"><br>
                </fieldset>

                <fieldset>
                    <legend>Operaciones</legend>
                    <fieldset id="operaciones">

                        <legend>Descuento o Recargo</legend>
                        <span id="grupo">
                            <label for="descuento">Descuento (10%): </label>
                            <input class="radio-group" type="radio" id="descuento" name="opcion" value="DESCUENTO" checked>

                            <label for="recargo"> Recargo (15%): </label>
                            <input class="radio-group" type="radio" id="recargo" name="opcion" value="RECARGO" <?= ((isset($opcion) && $opcion == 'RECARGO')) ? 'checked ' : ''; ?>><br>
                        </span>
                    </fieldset>

                    <fieldset id="operaciones">
                        <legend>IVA</legend>
                        <span id="grupo">
                            <label for="iva">Aplicar IVA: </label>
                            <select id="iva" name="iva">
                                <option value="5" <?= (isset($iva) && $iva == '5') ? 'selected' : ''; ?>>5%</option>
                                <option value="10" <?= (isset($iva)  && $iva == '10') ? 'selected' : ''; ?>>10%</option>
                                <option value="21" <?= (isset($iva)  && $iva == '21') ? 'selected' : ''; ?>>21%</option>
                            </select>
                        </span>
                    </fieldset>
                </fieldset>

                <fieldset>
                    <legend>Imagen del Producto</legend>
                    <label for="imagen_producto">Imagen del Producto: </label>
                    <input type="file" id="imagen_producto" name="imagen_producto">
                </fieldset>
                <input type="submit" value="Calcular Precio Final">
            </form>
        </div>