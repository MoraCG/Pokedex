<?php

class Presenter
{

    public function __construct()
    {
    }


    public function render($pagina,$pokemonData)
    {
         include_once("view/template/header.mustache");
         include_once ($pagina);
         mostrarPokemon($pokemonData["pokemons"]);
         include_once("view/template/footer.mustache");
    }
}