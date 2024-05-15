<?php
include_once ("Configuration.php");
include_once ("DataBase.php");
$Database = configuration::Database();






// Perform Pokemon search based on GET parameter 'buscador'
if (isset($_GET['buscador'])) {
    $buscador = $_GET['buscador'];
    $pokemonData = $Database->searchPokemon($buscador);
} else {
    // If no search term provided, fetch all Pokemon data
    $pokemonData = $Database->searchPokemon();
}

// Now you can use $pokemonData to display the results as needed
// Example:


//---------------------------------------------------



//---------------------------------------------------


// Display the Pokemon data
if (!empty($pokemonData)) {
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

    foreach ($pokemonData as $row) {
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
    // Optionally, display the full table if no search term is provided

}


?>