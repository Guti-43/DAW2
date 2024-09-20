/***************
    EXPLICACIÓN: 
    Cuando declaramos variables sin utilizar 
    var o let debemos inicializarla en el momento
    que la declaramos, darle un valor en el momento
    que aparece por primera vez:

    mi_variable=1;
    
    Esto hace que la variable se convierta en global
    pero solo dentro del fichero donde está definida.
    No se recomienda utilizar esta forma de crear variables
    porque podemos sobreescribir el valor de variables globales 
    definidas en otros ficheros o por el entorno 
    si coincidieran con el mismo nombre.
****************/
/***************
    TAREA:
    Ejecuta el siguiente código y fíjate en 
    el valor que va tomando mi_variable
    dentro de la función foo y fuera de ella

    Ahora borra la palabra var de la línea de código 
    var mi_variable=1;
    
    Tiene que quedar así:
    mi_variable=1;
    
    Ejecuta el código y observa de nuevo
    el valor que va tomando mi_variable
    dentro de la función foo y fuera de ella.

    Por último, ahora descomenta la línea
    "use strict";
    mi_variable no tiene que tener delante nada 
    tiene que estar así:
    mi_variable=1;

    Ejecuta el código y observa de nuevo
    que sucede.
    
    ¿Qué conclusiones sacas?
****************/
// "use strict";

function foo(){
    var mi_variable=1;
    console.log(`mi_variable dentro de la función: ${mi_variable}`);
}
foo();
console.log(`mi_variable fuera de la función: ${mi_variable}`);




