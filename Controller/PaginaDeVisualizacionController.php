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

        foreach ($pokemonData as &$pokemon) {
            if (isset($pokemon['tipos'])) {
                $pokemon['tipos'] = explode(', ', $pokemon['tipos']);
            } else {
                $pokemon['tipos'] = [];
            }
        }
        
        $this->presenter->render("view/PaginaDeVisualizacionView.mustache",["pokemonData"=>$pokemonData]);
    }


}