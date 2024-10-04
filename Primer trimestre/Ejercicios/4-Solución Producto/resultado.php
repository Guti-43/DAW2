  <div class="results-container">
      <h2>Factura</h2>
      <table>
          <thead>
              <tr>
                  <th>Nombre del Producto</th>
                  <th colspan="4">Imagen</th>
              </tr>
              <tr>
                  <td><strong><?= $nombreProducto ?></strong></td>
                  <td colspan="4"><img src="<?= $imagenSubida ?>" alt="Imagen del Producto" class="imagen-producto"></td>
              </tr>
              <tr>
                  <th>Cantidad</th>
                  <th>Precio Base</th>
                  <th><?= strtolower($opcion) ?> </th>
                  <th>IVA</th>
                  <th>Precio Final</th>
              </tr>
          </thead>
          <tbody>

              <tr>
                  <td><?= number_format($cantidad) ?></td>
                  <td><?= number_format($precioBase, 2, '.') ?> €</td>
                  <td><?= ($opcion == "DESCUENTO") ? DESCUENTO_PORCENTAJE . "%" : (($opcion == "RECARGO") ? RECARGO_PORCENTAJE . "%" : "") ?></td>
                  <td><?= ($iva) . "%" ?></td>
                  <td><?= number_format($precioFinal, 2) ?> €</td>
              </tr>
              <?php
                if (!empty($erroresMostrar)) {
                ?>
                  <tr>
                      <th class="errorRed" colspan="5">Factura errónea</th>
                  <tr>
                      <td class="error" colspan="5"><?= $erroresMostrar; ?></td>
                  </tr>
              <?php
                }
                ?>

          </tbody>
      </table>
  </div>
  </div>
  </body>

  </html>