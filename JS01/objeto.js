// Objeto de dos numeros
// metodo con dos numeros para sumar

function numeros (valor){
    this.valor = valor;
}

function sumar(num1, num2){
    return (num1.valor)+(num2.valor);
}
function restar(num1, num2){
    return (num1.valor)-(num2.valor);
}

const uno = new numeros(1)
const tres = new numeros(3)
console.log(sumar(uno, tres));
console.log(restar(tres, uno));
