// function saludo(nom, ape="Roronoa"){
//     console.log(`Hola ${nom} ${ape}!`);
// }
// saludo("Zoro");


// function cuadrado(numero=0)
// {
//  return numero*numero;
// }
// console.log(`El cuadrado es ${cuadrado(2)}`);


// const cuadrado = function(numero=0)
// {
//  return numero*numero;
// }
// console.log(`El cuadrado es ${cuadrado(2)}`);


        // Si funciona (Hosting)
// console.log(`El cuadrado es ${cuadrado(2)}`);
// function cuadrado(numero=0)
// {
//  return numero*numero;
// }

        // No funciona
// console.log(`El cuadrado es ${cuadrado(2)}`);
// const cuadrado = function(numero=0)
// {
//  return numero*numero;
// }

        // Tres sintaxis de funciones:
// function saludo() {
//   console.log("Hola");
// }
// const saludo = function () {
//   console.log("Hola");
// };
// const saludo = () => {
//   console.log("Hola");
// };


        // Funcion en coche
const coche = {
  marca: "Honda",
  modelo: "Civic",
  año: 2020,
        mostrarInfo: function(){
                console.log(`${this.marca} ${this.modelo}`);
        }
};
coche.mostrarInfo()
