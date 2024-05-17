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


        if (isset($_GET['eliminar'])) {
            $id_a_eliminar = $_GET['eliminar'];


            if ($this->model->eliminarPokemon($id_a_eliminar)) {

            } else {

            }
        }


        $pokemonData = $this->model->getPokemonData();
        //var_dump($pokemonData);


        $this->presenter->render("view/paginaPrincipalView.mustache", ["pokemonData" => $pokemonData]);
    }
}