<?php

class PokedexController
{
        private  $model;
        private $presenter;

    public function __construct( $model,$presenter)
    {
        $this-> model=$model;
        $this->presenter = $presenter;
    }

    public function get()
    {

        $pokemonData = $this->model->getPokemonData();
        //var_dump(  $pokemonData);
        //aca hay un error q no muestra nada y pokemon data si tiene cosas
        $this->presenter->render("view/paginaPrincipalView.mustache",["pokemonData" => $pokemonData]);



    }
}