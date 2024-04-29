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

// Consulta SQL para obtener los datos de los Pokémon
$sql = "SELECT pokemon.*, GROUP_CONCAT(tipo.nombre SEPARATOR ',') AS tipos 
        FROM pokemon 
        INNER JOIN pokemon_tipo ON pokemon.id = pokemon_tipo.pokemon_id 
        INNER JOIN tipo ON pokemon_tipo.tipo_id = tipo.id 
        GROUP BY pokemon.id 
        LIMIT 151";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
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

        // Mostrar las imágenes de los tipos de Pokémon
        echo "<td>";
        $tipos = explode(',', $row["tipos"]);
        foreach ($tipos as $tipo) {
            echo "<img src='TipoPokemon/tipo_" . trim($tipo) . ".png' alt='Tipo " . trim($tipo) . " class='tipoTabla'> "; // Establece solo la altura para mantener la proporción
        }
        echo "</td>";

        echo "<td>" . $row["numero"] . "</td>";
        echo "<td><a href='paginaDeVisualizacion.php?id=" . $row["id"] . "'>" . $row["nombre"] . "</a></td>";
        if (isset($_SESSION["usuario"])) {
            echo "<td><form action='eliminar.php' method='post'><button type='submit' name='eliminar' value='" . $row["id"] . "'>Eliminar</button></form>";
            // echo "<td><form action='editar.php' method='post'>
            //         <input type='text' name='id_registro'>
            //         <input type='text' name='nuevo_valor'>
            //         <button type='submit'>Editar</button>
            //     </form>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "No hay Pokémon registrados en la base de datos.";
}


// Cerrar conexión
$conn->close();
?>