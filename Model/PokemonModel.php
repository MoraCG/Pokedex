<?php

class PokemonModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getPokemonData()
    {

        if (isset($_GET['buscador'])) {
            $buscador = $_GET['buscador'];
            $encontrado =  $this->searchPokemon($buscador);
            if(!empty($encontrado)){
                echo "No se encontro nada 😰";
                return $encontrado;
            }else{
                return $this->searchPokemon();
            }
        } else {
            return $this->searchPokemon();
        }

    }

    public function searchPokemon($searchTerm = "")
    {
        $sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ', ') AS tipos
            FROM pokemon 
            LEFT JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
            LEFT JOIN tipo ON pokemon_tipo.tipo_id = tipo.id";

        if ($searchTerm !== null && $searchTerm !== "") {
            $sql .= " WHERE pokemon.nombre LIKE '%{$searchTerm}%'";
        }

        $sql .= " GROUP BY pokemon.id";

        return $this->database->query($sql);
    }


    public function buscarPokemonId($id)
    {
        $sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ', ') AS tipos 
            FROM pokemon 
            LEFT JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
            LEFT JOIN tipo ON pokemon_tipo.tipo_id = tipo.id 
            WHERE pokemon.id = {$id}
            GROUP BY pokemon.id";

        return $this->database->query($sql);
    }

    public function obtenerIdTipo($tipo)
    {

        $sql = "SELECT id FROM tipo WHERE nombre = ?";
        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("s", $tipo);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        return $row ? $row['id'] : null; // Devuelve el ID del tipo o null si no se encuentra
    }

    public function insertarPokemon($imagen, $nombre, $numero, $descripcion)
    {
        $sql = "INSERT INTO pokemon (imagen, nombre, numero, descripcion)
                VALUES ('$imagen', '$nombre', $numero, '$descripcion')";

        $this->database->execute($sql);



    }


    public function insertarTipoPokemon($pokemon_id, $tipo_id)
    {
        $pokemon_id = intval($pokemon_id); // Asegurarse de que $pokemon_id sea un entero
        $tipo_id = intval($tipo_id); // Asegurarse de que $tipo_id sea un entero

        // Crear la consulta SQL para insertar un nuevo tipo de Pokémon
        $sql = "INSERT INTO pokemon_tipo (pokemon_id, tipo_id)
                VALUES ($pokemon_id, $tipo_id)";

        $this->database->execute($sql);
    }

    public function eliminarPokemon($id_a_eliminar)
    {

        $sql = "DELETE FROM pokemon_tipo WHERE pokemon_id = '$id_a_eliminar'";
        $this->database->execute($sql);
        $sql = " DELETE FROM pokemon WHERE id = '$id_a_eliminar';";
        $this->database->execute($sql);

    }
    public function obtenerTiposDisponibles()
    {
        $sql = "SELECT nombre FROM tipo";
        return $this->database->query($sql);
    }

    function LogInconsulta($usuario, $password) {
    
        // Consulta para verificar usuario y contraseña
        $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND password = '$password'";
        $result =  $this->database->execute($sql);
    
        // Si se encuentra un resultado, es válido
        return $result->num_rows == 1;
    }
}