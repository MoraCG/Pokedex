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

    public function get($id)
    {
        if ($id === 'nuevo') {

            $this->presenter->render("view/PaginaCreacionView.mustache");
        } else {
            $this->editar($id);
        }
    }

    public function editar($id)
    {

        $pokemonData = $this->model->buscarPokemonId($id);
       // var_dump($pokemonData );
        $this->presenter->render("view/PaginaEdicionView.mustache", ["pokemonData" => $pokemonData]);
    }

    public function insertar()
    {

        $nombre = $_POST['nombre'];
        $numero = $_POST['numeroPokemon'];
        $descripcion = $_POST['descripcion'];
        $tipos = isset($_POST['tipos']) ? $_POST['tipos'] : array();




        $directorio_destino = 'img/pokemon/';

        if (isset($_FILES['fotoPokemon'])) {
            $archivo_nombre = $_FILES['fotoPokemon']['name'];
            $archivo_temporal = $_FILES['fotoPokemon']['tmp_name'];
            $archivo_tamaño = $_FILES['fotoPokemon']['size'];
            $archivo_error = $_FILES['fotoPokemon']['error'];


            $ruta_destino = $directorio_destino . $archivo_nombre;
            move_uploaded_file($archivo_temporal, $ruta_destino);
        }


        $pokemon_id = $this->model->insertarPokemon($archivo_nombre, $nombre, $numero, $descripcion);
        foreach ($tipos as $tipo) {
            $tipo_id = $this->model->obtenerIdTipo( $tipo);
            $this->model->insertarTipoPokemon($pokemon_id, $tipo_id);
        }


        header("Location: index.php");
        exit();
    }


    public function editarPokemon()
    {
        $id_a_eliminar = $_POST['id'];
        $this->model->eliminarPokemon($id_a_eliminar);
        $this->insertar();
    }
}