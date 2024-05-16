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
        $this->presenter->render("paginaPrincipal.php",["pokemons"=>$pokemonData]);



    }
}