<?php

$servername = "localhost"; // Host de la base de datos
$username = "root"; // Nombre de usuario
$password = ""; // Contraseña predeterminada de MySQL en XAMPP
$database = "listapokemon"; // Nombre de la base de datos que quieres conectar

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}



function buscarPokemon($buscador, $conn)
{

    // Preparar la consulta

    $sql = "SELECT * FROM pokemon WHERE nombre LIKE '%$buscador%'";
    $result = $conn->query($sql);
// Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo "<h2>Resultados de la búsqueda:</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Imagen</th>";
        echo "<th>Tipo</th>";
        echo "<th>Número</th>";
        echo "<th>Nombre</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='imagenes/" . $row["imagen"] . "' alt='Imagen " . $row["imagen"] . "' class='imagenTabla'></td>";
            $tipos = explode(',', $row["tipo"]); // Dividir los tipos por coma
            foreach ($tipos as $tipo) {
                echo $tipo;
            }
            echo "<td>" . $row["numero"] . "</td>";
            echo "<td><a href='paginaDeVisualizacion.php?id=" . $row["id"] . "'>" . $row["nombre"] . "</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron Pokémon que coincidan con '$buscador'.";
    }
}

// Verificar si se ha enviado un término de búsqueda a través del formulario GET
if (isset($_GET['buscador'])) {
    $buscador= $_GET['buscador'];
    buscarPokemon($buscador, $conn);
} else {
    echo "Por favor, proporciona un término de búsqueda a través del formulario GET.";
}


// Cerrar conexión
 //$conn->close();
?>