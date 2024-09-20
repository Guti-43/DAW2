/***************
    TAREA:
    Ejecuta el siguiente código y fíjate en 
    el valor que va tomando mi_variable
    dentro de la función foo y fuera de ella

    Ahora comenta la línea de código 
    que pone coméntame y observa de nuevo
    el valor que va tomando mi_variable
    dentro de la función foo y fuera de ella

    ¿Qué conclusiones sacas?
****************/

var mi_variable=0;

function foo(){
    var mi_variable; //Coméntame

    console.log(`mi_variable dentro de la función: ${mi_variable}`);
    
    console.log('Cambiamos el valor de mi_variable a 1');
    mi_variable=1;
    
    console.log(`mi_variable dentro de la función: ${mi_variable}`);
}
foo();
console.log(`mi_variable fuera de la función: ${mi_variable}`);