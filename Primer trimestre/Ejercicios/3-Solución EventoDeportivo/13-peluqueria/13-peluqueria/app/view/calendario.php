 <div class="calendario-container">
     <table class="calendario">
         <thead>
             <tr>
                 <th>Hora</th>
                 <th>Lunes</th>
                 <th>Martes</th>
                 <th>Miércoles</th>
                 <th>Jueves</th>
                 <th>Viernes</th>
                 <th>Sábado</th>
             </tr>
         </thead>
         <tbody>
             <?php
                $intervalos = [
                    '09:00 - 10:00',
                    '10:00 - 11:00',
                    '11:00 - 12:00',
                    '12:00 - 13:00',
                    '13:00 - 14:00',
                    '14:00 - 15:00',
                    '15:00 - 16:00',
                    '16:00 - 17:00'
                ];

                foreach ($intervalos as $intervalo) {
                    echo "<tr>";
                    echo "<td>$intervalo</td>";
                    for ($i = 0; $i < 6; $i++) {
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
                ?>
         </tbody>
     </table>
 </div>