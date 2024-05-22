<?php
class PokedexController
{
    private $model;
    private $presenter;

    public function __construct($model, $presenter)
    {
        $this->model = $model;
        $this->presenter = $presenter;
    }

    public function get()
    {
        $usuario = $_SESSION['usuario'] ?? null;
        $error = $_SESSION["error_login"] ?? null;
     
        if (isset($_GET['eliminar'])) {
            $id_a_eliminar = $_GET['eliminar'];
            $this->model->eliminarPokemon($id_a_eliminar);
        }

        $pokemonData = $this->model->getPokemonData();

        // Preprocesar los tipos para cada Pokémon
        foreach ($pokemonData as &$pokemon) {
            if (isset($pokemon['tipos'])) {
                $pokemon['tipos'] = explode(', ', $pokemon['tipos']);
            } else {
                $pokemon['tipos'] = [];
            }
        }



         // $this->presenter->render("view/paginaPrincipalView.mustache", ["pokemonData" => $pokemonData]);

        $templateData = [
            "pokemonData" => $pokemonData,
            "usuario" => $usuario,
            "error" => $error // Pasar el mensaje de error a la plantilla
        ];

        $this->presenter->render("view/paginaPrincipalView.mustache", $templateData);




    }


}
