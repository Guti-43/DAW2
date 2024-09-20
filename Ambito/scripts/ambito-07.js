/***************
    TAREA:
    
    Ejecuta el siguiente código y fíjate en 
    en la salida de delete si es true o false
    Observa también si se muestran
    las propiedades de coche2 en la consola.

    Cambia la palabra const a var y fíjate en 
    en la salida de delete si es true o false
    Observa también si se muestran
    las propiedades de coche2 en la consola.
    
    Ahora cambia la palabra var a let y 
    ejecuta de nuevo el código y fíjate en 
    en la salida de delete si es true o false
    Observa también si se muestran
    las propiedades de coche2 en la consola.
    
    Por último, borra la palabra let y 
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

    ¿Qué conclusiones sacas?
****************/

const coche2={  
    modelo: "León",
    año: 2021,    
};

console.log(delete coche2);
console.log(coche2);


