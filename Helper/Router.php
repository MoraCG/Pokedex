<?php

class Router
{


    public function __construct()
    {
    }

    public function route($controller ,$action)
    {
        switch ($controller) {

            case 'PaginaDeVisualizacion':
                $id = $_GET['id'];
                $paginaDeVisualizacionController = Configuration::getPaginaDeVisualizacionController();
                $paginaDeVisualizacionController->get($id);
                break;

            case 'PaginaDeCreacion':
                $paginaDeCreacionController = Configuration::getPaginaDeCreacionController();

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $paginaDeCreacionController->insertar();


                } else {

                    $id = $_GET['id'];
                    $paginaDeCreacionController->get($id);
                }
                break;

            case 'LoginsController':
                $loginsController = Configuration::getLoginsController();
                if ($action == "logout") {


                    $loginsController->logout();

                     }
                else{
                    $loginsController->get();
                }
        break;



            default:

                $PokedexController=Configuration::getPokedexController();

                $PokedexController->get();
                break;
        }
    }
}