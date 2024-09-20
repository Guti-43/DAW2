/***************
    TAREA:
    Ejecuta el siguiente código y fíjate que 
    el objeto coche solo es visible dentro del bloque
    donde se define, por eso al intentar sacarlo
    a consola fuera del bloque obtenemos un error.
    
    Ahora comenta la línea console.log(coche);
    y descomenta la línea console.log(refObj);

    Observa como al ejecutar el código refObj
    no da error y además tiene como marca XX
    
    ¿Qué conclusiones sacas?
****************/

let refObj;

{
    const coche={
        marca: "Seat",
    };

    refObj=coche;
    coche.marca="XX"
};

console.log(coche);  // Después de ejecutar el código una vez comenta esta línea
//console.log(refObj);  // Después de ejecutar el código una vez descomenta esta línea