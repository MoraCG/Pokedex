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
                $id = $_GET['id']??'';
                if ($id==='') {

                    $paginaDeCreacionController->get();
                }



                else {
                    $paginaDeCreacionController->editar($id);
                }


                break;
            default:

                $PokedexController=Configuration::GetPokedexController();

                $PokedexController->get();


                break;


        }



    }
}