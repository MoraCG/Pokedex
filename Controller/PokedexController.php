<?php

class PokedexController
{
        private  $model;
    public function __construct( $model)
    {
        $this-> model=$model;
    }

    public function getList()
    {

        include_once ("paginaPrincipal.php");
        $pokemonData = $this->model->getPokemonData();
        mostrarPokemon($pokemonData);
    }
}