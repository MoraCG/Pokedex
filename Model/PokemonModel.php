<?php

class PokemonModel
{
        private $database;
    public function __construct($database)
    {
        $this->database=$database;
    }

    public function getPokemonData()
    {


        if (isset($_GET['buscador'])) {
            $buscador = $_GET['buscador'];
            return $this->searchPokemon($buscador);
        } else {

            return $this->searchPokemon();
        }

    }
    public function searchPokemon($searchTerm = "") {
        $sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ',') AS tipos 
        FROM pokemon 
        INNER JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
        INNER JOIN tipo ON pokemon_tipo.tipo_id = tipo.id ";

        if ($searchTerm !== null) {
            $sql .= "WHERE pokemon.nombre LIKE '%{$searchTerm}%' ";
        }

        $sql .= "GROUP BY pokemon.id";

        return   $this->database->query($sql);




            }
        }



