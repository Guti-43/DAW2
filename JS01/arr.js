// function incluir(miArray, mes){

//     let esta = false;
//     for (let i=0; i<miArray.length; i++){
//         if ( miArray[i] == mes){
//             esta = true;
//         }
//     }
//     return esta;

// };

// const meses=["Enero","Febrero","Marzo","Abril"];
// console.log(incluir(meses, "Febrero"));


    // Include
// function incluir(miArray, mes) {
//     let esta = false;
//     for (let i = 0; i < miArray.length; i++) {
//         esta = esta || (miArray[i] === mes);  // Si ya es true, lo mantiene, si no, compara
//     }
//     return esta;  // Devuelve el valor de "esta"
// }

// const meses = ["Enero", "Febrero", "Marzo", "Abril"];
// console.log(incluir(meses, "Febrero")); // true
// console.log(incluir(meses, "Mayo"));    // false



//     // Some
// const mesesO = [{nombre: "Enero"}, {nombre: "Febrero"}, {nombre: "Marzo"}];

// function incluir(mesesArray, mesBuscado) {
//     let encontrado = false;  // Inicializamos la variable para verificar si el mes está presente
//     for (let i = 0; i < mesesArray.length; i++) {  // Recorremos cada objeto del array
//         encontrado = encontrado || (mesesArray[i].nombre === mesBuscado);  // Comparamos el nombre
//     }
//     return encontrado;  // Retornamos el resultado final
// }

// console.log(incluir(mesesO, "Febrero")); // true
// console.log(incluir(mesesO, "Mayo"));    // false



const meses = [
    { nombre: "Enero", días: 31 },
    { nombre: "Febrero", días: 28 },
    { nombre: "Marzo", días: 31 }
];

function comparar(mes) {
    return mes.días > 30; // Devuelve true si el mes tiene más de 30 días
}

function todos(miArray, comparar) {
    let resultado = true; // Inicializamos resultado como true
    for (let i = 0; i < miArray.length; i++) {
        resultado = resultado && comparar(miArray[i]); // Usa && para combinar resultados
    }
    return resultado; // Devuelve el resultado final
}

console.log(todos(meses, comparar)); // false
