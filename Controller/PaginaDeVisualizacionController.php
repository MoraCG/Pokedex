<?php

class PaginaDeVisualizacionController
{
    private $presenter;
    private $model;

    public function __construct($PokemonModel, $Presenter)
    {
        $this->model = $PokemonModel;
        $this->presenter = $Presenter;
    }

    public function get($id)
    {
        $pokemonData = $this->model->buscarPokemonId($id);
        $this->presenter->render("view/PaginaDeVisualizacionView.mustache",["pokemonData"=>$pokemonData]);
    }


}