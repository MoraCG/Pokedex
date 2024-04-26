<?php

$servername = "localhost"; // Host de la base de datos
$username = "root"; // Nombre de usuario
$password = ""; // Contraseña predeterminada de MySQL en XAMPP
$database = "test"; // Nombre de la base de datos que quieres conectar

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}



function buscarPokemon($buscador, $conn)
{

    // Preparar la consulta

    $sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ',') AS tipos 
        FROM pokemon 
        INNER JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
        INNER JOIN tipo ON pokemon_tipo.tipo_id = tipo.id 
        WHERE pokemon.nombre LIKE '%$buscador%' 
        GROUP BY pokemon.id 
        LIMIT 151";
    $result = $conn->query($sql);
// Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo "<h2>Resultados de la búsqueda:</h2>";
        echo "<div class='w3-margin'>";
        echo "<table class='w3-table w3-bordered'>";
        echo "<thead>";
        echo "<tr class='w3-dark-grey'>";
        echo "<th>Imagen</th>";
        echo "<th>Tipo</th>";
        echo "<th>Número</th>";
        echo "<th>Nombre</th>";
        echo "<th>Modificaciones</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='/imagenes/pokemon/" . $row["imagen"] . "' alt='imagen.jpg' class='imagenTabla'></td>";

            echo "<td>" . $row["tipos"] . "</td>";
            echo "</td>"; // Finalizar la celda para los tipos
            echo "<td>" . $row["numero"] . "</td>";
            echo "<td><a href='paginaDeVisualizacion.php?id=" . $row["id"] . "'>" . $row["nombre"] . "</a></td>";
            if(isset($_SESSION["usuario"])){
            echo "<td><button>Editar</button>" . " " . "<button>Eliminar</button></td>";
            }
            echo "</tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "No se encontraron Pokémon que coincidan con '$buscador'.";
    }

}



// Verificar si se ha enviado un término de búsqueda a través del formulario GET
if (isset($_GET['buscador'])) {
    $buscador= $_GET['buscador'];
    buscarPokemon($buscador, $conn);
} else {
    echo "Por favor, proporciona un término de búsqueda";
}


// Cerrar conexión
$conn->close();
?>