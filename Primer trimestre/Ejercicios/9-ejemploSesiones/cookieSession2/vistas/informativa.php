 <div class="informacion">
     <h2>Información</h2>
     <p><?= $mensaje; ?></p>
     <?php if (!empty($datos)): ?>
         <pre><?php print_r($datos); ?></pre>
     <?php endif; ?>
 </div>
 </div>
 </body>

 </html>