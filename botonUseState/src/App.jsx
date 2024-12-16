import {useState} from "react";
import { Header } from "./components/Header.jsx";
import { Formulario } from "./components/Formulario.jsx"
import { Footer } from "./components/Footer.jsx";

function App() {
  const [nombre, setNombre] = useState()

  return (
    <>
      <Header/>
      <Formulario setNombre={setNombre}></Formulario>
      <Footer nombre={nombre}></Footer>
    </>
  )
}

export default App
