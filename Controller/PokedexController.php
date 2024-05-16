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

        $this->presenter->render("view/paginaPrincipalView.mustache",["pokemonData" => $pokemonData]);



    }
}