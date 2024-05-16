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
                $paginaDeVisualizacionController = configuration::GetPaginaDeVisualizacionController();
                $paginaDeVisualizacionController->get($id);
                break;

            case 'PaginaDeCreacion':

                $paginaDeCreacionController = configuration::GetPaginaDeCreacionController();
                $id = $_GET['id']??'';
                if ($id==='') {

                    $paginaDeCreacionController->get();
                }



                else {
                    $paginaDeCreacionController->editar($id);
                }


                break;
            default:

                $PokedexController=configuration::GetPokedexController();

                $PokedexController->get();


                break;


        }



    }
}