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

            default:

                $PokedexController=configuration::GetPokedexController();

                $PokedexController->get();


                break;


        }



    }
}