<?php

class Database
{
    private $conn;

    public function __construct($servername, $username, $dbname, $password)
    {
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function query($sql){
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function execute($sql)
    {
        mysqli_query($this->conn, $sql);
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

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    



    public function __destruct()
    {
        mysqli_close($this->conn);
    }

}



