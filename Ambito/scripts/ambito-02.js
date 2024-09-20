/***************
    TAREA:
    Ejecuta el siguiente código y fíjate en 
    el valor que va tomando variable
    dentro de la función foo y fuera de ella

    ¿Qué conclusiones sacas?
****************/

function foo() {
    var variable;

    variable=5;
    return variable;
}
    
console.log(foo());   
console.log({variable});

