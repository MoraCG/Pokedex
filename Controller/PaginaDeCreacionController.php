<?php

class PaginaDeCreacionController
{


    private $model;
    private $presenter;

    public function __construct($PokemonModel, $Presenter)
    {
        $this->model = $PokemonModel;
        $this->presenter = $Presenter;
    }

    public function get()
    {
        $this->presenter->render("view/PaginaCreacionView.mustache");
    }
    public function editar($id)
    {


        $pokemonData = $this->model->buscarPokemonId($id);
        $this->presenter->render("view/PaginaCreacionView.mustache",["pokemonData"=>$pokemonData]);
    }

}