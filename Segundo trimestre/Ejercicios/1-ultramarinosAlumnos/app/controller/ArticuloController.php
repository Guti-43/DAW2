<?php
class ArticuloController
{
    public function index($accion = null, $error = null)
    {
        require_once "app/view/header.php";

        if ($accion === 'mostrar') {
            $this->gestionarArticulosTodos($error);
            //$this->gestionarArticulosPaginados($error);
        } else {
            require_once "app/view/home.php";
        }
        require_once "app/view/footer.php";
    }

    public function gestionarArticulosTodos($error = null)
    {
        $articulos = Articulo::obtenerInstancia()->obtenerTodosArticulos();
        $error = !empty($articulos) ? NULL : "No se han encontrado artículos";
        require_once "app/view/paginacion.php";
        require_once "app/view/articulos.php";
    }
    public function gestionarArticulosPaginados($error = null)
    {
        //Realizar este método

        //Debe obtener los datos necesarios para la vista paginacion.php

    }
}
