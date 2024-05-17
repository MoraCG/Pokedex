<?php

class Router
{


    public function __construct()
    {
    }

    public function route($controller ,$action)
    {
        switch ($controller){

            case 'PaginaDeVisualizacion':
                $id = $_GET['id'];
                $paginaDeVisualizacionController = Configuration::GetPaginaDeVisualizacionController();
                $paginaDeVisualizacionController->get($id);
                break;

            case 'PaginaDeCreacion':
                $paginaDeCreacionController = Configuration::GetPaginaDeCreacionController();

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $paginaDeCreacionController->insertar();


                } else {

                    $id = $_GET['id'];
                    $paginaDeCreacionController->get($id);
                }
                break;
            default:

                $PokedexController=Configuration::GetPokedexController();

                $PokedexController->get();
                break;
        }
    }
}