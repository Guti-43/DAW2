/***************
    EXPLICACIÓN:
    La palabra reservada delete SOLO borra 
    propiedades de los objetos y devuelte
    true si el borrado ha tenido éxito.
    Además no borra variables.

    Pero vamos a ejecutar delete directamente
    sobre objetos a ver que pasa... 
****************/    
/***************
    TAREA:    
    Ejecuta el siguiente código y fíjate en 
    en la salida de delete si es true o false
    Observa también si se muestran
    las propiedades de coche2 en la consola.
    
    Ahora borra la palabra const y 
    no pongas nada delante de coche2, ni var ni let,
    quedando así:

    coche2={
    modelo: "León",
    año: 2021,    
    };
    
    Y ejecuta de nuevo el código y fíjate en 
    en la salida de delete si es true o false
    Observa también si se muestran
    las propiedades de coche2 en la consola.

    Por último, descomenta la línea "use strict";
    para que JS se ponga en modo restrictivo:

    1) Comenta la línea console.log(delete coche2);
    y ejecuta el código, si el objeto coche2 
    no tiene const delante dará error por este motivo.
    
    2) Descomenta la línea console.log(delete coche2);
    y ejecuta el código, delete dará error 
    por intentar borrar un objeto, ya que, 
    como hemos dicho al principio del ejercio,
    solo borra propiedades de los objetos.

    ¿Qué conclusiones sacas?
****************/

// "use strict";

const coche2={  
    modelo: "León",
    año: 2021,    
};

console.log(delete coche2);
