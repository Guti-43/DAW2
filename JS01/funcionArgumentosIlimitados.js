function mostrarArgumentos(...args) {
    console.log(`Se han introducido ${args.length} argumentos:`);
    args.forEach((arg, index) => {
        console.log(`Argumento ${index + 1}: ${arg}`);
    });
}

mostrarArgumentos(1, 'hola', true, [1, 2, 3], { nombre: 'Juan' });