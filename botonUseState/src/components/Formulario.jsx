import { useState } from "react";

export const Formulario = ({setNombre}) => {
    return (
        <>
            <form onSubmit={
                (e) => {
                    e.preventDefault();
                    setNombre(document.querySelector("input").value)
                }
            }>
                Nombre: <input type="text"/>
            </form>
        </>
    )
}
