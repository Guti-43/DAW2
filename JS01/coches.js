// Definimos el primer objeto coche1 con tres propiedades: marca, modelo y año
const coche1 = {
    marca: "Seat",     // Marca del coche1: Seat
    modelo: "León",    // Modelo del coche1: León
    año: 2021,         // Año del coche1: 2021
  };
  
  // Definimos el segundo objeto coche2 con tres propiedades: marca, modelo y año
  const coche2 = {
    marca: "Honda",    // Marca del coche2: Honda
    modelo: "Civic",   // Modelo del coche2: Civic
    año: 2020,         // Año del coche2: 2020
  };
  
  // Usamos desestructuración para extraer las propiedades "marca" y "modelo" del objeto coche1
  // Esto es equivalente a hacer: const marca1 = coche1.marca; const modelo1 = coche1.modelo;
  const {marca: marca1, modelo: modelo1, color: color1="rojo"} = coche1;
  
  // Usamos desestructuración para extraer las propiedades "marca" y "modelo" del objeto coche2
  // Esto es equivalente a hacer: const marca2 = coche2.marca; const modelo2 = coche2.modelo;
  const {marca: marca2, modelo: modelo2, color: colo2="blanco"} = coche2;
  
  // Mostramos en la consola un mensaje que concatena las marcas y modelos de ambos coches
  // Usamos "+" para concatenar las variables con el texto estático
  console.log("El coche 1 es un " + marca1 + " " + modelo1 + " y el coche 2 es un " + marca2 + " " + modelo2);
  
  // Resultado esperado en consola:
  // El coche 1 es un Seat León y el coche 2 es un Honda Civic
  