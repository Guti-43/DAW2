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
                  <!-- <th>Nombre de la opción elegida: descuento o recargo</th> -->
                  <th>IVA</th>
                  <th>Precio Final</th>
              </tr>
          </thead>
          <tbody>

              <tr>
                  <!-- <td>Incluir las filas necesarias</td> -->
              </tr>
              <?php
                //   Revisa el if
                if (1) {
                ?>
                  <tr>
                      <th class="errorRed" colspan="5">Factura errónea</th>
                  <tr>
                      <td class="error" colspan="5">Mostrar errores</td>
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