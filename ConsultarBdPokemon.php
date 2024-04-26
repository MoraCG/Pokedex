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

function eliminar($idPokemon, $conn)
{
    $sql = "DELETE FROM pokemon WHERE pokemon.id = $idPokemon";
    return $conn->query($sql);
}

function buscarPokemon($buscador = "", $conn)
{
    // Variable para controlar si se ha realizado una búsqueda
    $busquedaRealizada = !empty($buscador);

    // Si se ha realizado una búsqueda, ejecutar la consulta para la búsqueda
    if ($busquedaRealizada) {
        // Mensaje para los resultados de búsqueda
        echo "<h2>Resultados de la búsqueda:</h2>";

        // Preparar la consulta para la búsqueda
        $sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ',') AS tipos 
            FROM pokemon 
            INNER JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
            INNER JOIN tipo ON pokemon_tipo.tipo_id = tipo.id 
            WHERE pokemon.nombre LIKE '%$buscador%' 
            GROUP BY pokemon.id 
            LIMIT 151";
    } else {
        // Si no se ha realizado una búsqueda, mostrar la tabla completa
        // Mensaje para la tabla completa
        echo "<h2>Tabla de Pokémon</h2>";

        // Preparar la consulta para la tabla completa
        $sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ',') AS tipos 
            FROM pokemon 
            INNER JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
            INNER JOIN tipo ON pokemon_tipo.tipo_id = tipo.id 
            GROUP BY pokemon.id 
            LIMIT 151";
    }

    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo "<div class='w3-margin'>";
        echo "<table class='w3-table w3-bordered'>";
        echo "<thead>";
        echo "<tr class='w3-dark-grey'>";
        echo "<th>Imagen</th>";
        echo "<th>Tipo</th>";
        echo "<th>Número</th>";
        echo "<th>Nombre</th>";
        if (isset($_SESSION["usuario"])) {
            echo "<th>Modificaciones</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='pokemon/" . $row["imagen"] . "' alt='imagen.jpg' class='imagenTabla'></td>";

            echo "<td>" . $row["tipos"] . "</td>";
            echo "<td>" . $row["numero"] . "</td>";
            echo "<td><a href='paginaDeVisualizacion.php?id=" . $row["id"] . "'>" . $row["nombre"] . "</a></td>";
            if (isset($_SESSION["usuario"])) {
                echo "<td><button onclick='editar()'>Editar</button>" . " ";
                //FALTA LA REFERENCIA A LA CONNEXION PARA PODER ELIMINAR
                //         echo "<button onclick='eliminar(" . $row["id"] . ")'>Eliminar</button></td>";
            }

            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        // Si no se encontraron resultados en la búsqueda, mostrar la tabla completa
        if ($busquedaRealizada) {
            echo "No se encontraron Pokémon que coincidan con '$buscador'. Mostrando la tabla completa.";
            buscarPokemon("", $conn); // Mostrar la tabla completa
        } else {
            echo "No hay Pokémon registrados en la base de datos.";
        }
    }

}

// Verificar si se ha enviado un término de búsqueda a través del formulario GET
if (isset($_GET['buscador'])) {
    $buscador = $_GET['buscador'];
    buscarPokemon($buscador, $conn);
} else {
    // Si no se ha realizado una búsqueda, mostrar la tabla completa
    buscarPokemon("", $conn);
}

// Cerrar conexión

$conn->close();
?>