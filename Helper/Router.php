<?php

class Router
{


    public function __construct()
    {
    }

    public function route($controller ,$action)
    {
        switch ($controller){


            default:

                $PokedexController=configuration::GetPokedexController();

                $PokedexController->get();


                break;


        }



    }
}