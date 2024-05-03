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
// Verificar si se ha enviado un término de búsqueda a través del formulario GET
if (isset($_GET['buscador'])) {
    $buscador = $_GET['buscador'];
    buscarPokemon($buscador, $conn);
} else {
    // Si no se ha realizado una búsqueda, mostrar la tabla completa
    buscarPokemon("", $conn);
}

//---------------------------------------------------



//---------------------------------------------------

function buscarPokemon($buscador = "", $conn)
{
    $busquedaRealizada = !empty($buscador);

    if ($busquedaRealizada) {
        echo "<h2>Resultados de la búsqueda:</h2>";
        $sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ',') AS tipos 
                FROM pokemon 
                INNER JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
                INNER JOIN tipo ON pokemon_tipo.tipo_id = tipo.id 
                WHERE pokemon.nombre LIKE '%$buscador%' 
                GROUP BY pokemon.id";
    } else {
        echo "<h2>Tabla de Pokémon</h2>";
        $sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ',') AS tipos 
                FROM pokemon 
                INNER JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
                INNER JOIN tipo ON pokemon_tipo.tipo_id = tipo.id 
                GROUP BY pokemon.id ";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='w3-margin'>";
        echo "<table class='w3-table w3-bordered'>";
        echo "<thead>";
        echo "<tr class='w3-dark-grey'>";
        echo "<th>Imagen</th>";
        echo "<th>Tipo</th>"; // Columna para imágenes de tipos
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
            echo "<td><img src='pokemon/" . $row["imagen"] . "' alt='imagen' class='imagenTabla' style='width: 64px; height: auto;'></td>";

            // Mostrar las imágenes para los tipos
            echo "<td>"; // Apertura de celda para imágenes de tipo
            $tipos = explode(',', $row["tipos"]); // Convertir la cadena de texto en un arreglo

            foreach ($tipos as $tipo) {
                // Mostrar la imagen para cada tipo
                echo "<img src='TipoPokemon/tipo_" . trim($tipo) . ".png' alt='" . trim($tipo) . "' style='width: auto; height: auto;' />";
            }

            echo "</td>"; // Cierre de celda para imágenes de tipo

            echo "<td>" . $row["numero"] . "</td>";
            echo "<td><a href='paginaDeVisualizacion.php?id=" . $row["id"] . "'>" . $row["nombre"] . "</a></td>";
            if (isset($_SESSION["usuario"])) {
                echo "<td class='btn-group'>"; // Contenedor para los botones
                echo "<form action='eliminar.php' method='post' style='display: inline-block;'>";
                echo "<button type='submit' name='eliminar' value='" . $row["id"] . "' class='btn btn-danger'>Eliminar</button>";
                echo "</form>";

                echo "<form action='formDeCreaciónEdición.php' method='get' style='display: inline-block;'>";
                echo "<button type='submit' name='editar' value='" . $row["id"] . "' class='btn'>Editar</button>";
                echo "</form>";

            }
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "No se encontraron Pokémon que coincidan con '$buscador'.";
        buscarPokemon("", $conn);
    }
}

// Cerrar conexión
$conn->close();
?>