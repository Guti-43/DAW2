function articulo (nom, precio) {
    this.nom = nom,
    this.precio = precio
}

const pan = new articulo("Pan", 0.65);
const salchicha = new articulo("Salchicha", 1.20)

console.log(pan);
console.log(salchicha);

