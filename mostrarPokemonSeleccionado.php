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

function mostrarPokemonSeleccionado($id)
{
    global $conn;

    // Consulta preparada para obtener el nombre, imagen y descripción del Pokémon
    $stmt = $conn->prepare("SELECT nombre, imagen, descripcion FROM pokemon WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nombre, $imagen, $descripcion);
    $stmt->fetch();
    $stmt->close();

    // Consulta preparada para obtener los tipos del Pokémon
    $stmtTipos = $conn->prepare("SELECT T.nombre FROM pokemon P 
                   JOIN pokemon_tipo PoT ON P.id = PoT.pokemon_id
                   JOIN Tipo T ON PoT.tipo_id = T.id
                   WHERE P.id = ?");
    $stmtTipos->bind_param("i", $id);
    $stmtTipos->execute();
    $resultTipos = $stmtTipos->get_result();
    $tipos = "";
//    while ($rowTipo = $resultTipos->fetch_assoc()) {
//        $tipos .= $rowTipo['nombre'] . ", ";
//    }

    // Imprimir la sección del Pokémon
    echo '<section class="w3-center" id="contenedorInfo">
    <div class="w3-margin" id="imagenInfo">
        <img src="pokemon/' . $imagen . '" alt="Imagen Pokémon seleccionado" id="imgVisualizacion">
    </div>
    <div class="w3-margin" id="info">
        <div id="tipoNombre">';
    while ($rowTipo = $resultTipos->fetch_assoc()) {
        echo '<img src="TipoPokemon/tipo_' . $rowTipo["nombre"] . '_icono.png" alt="Tipo" id="imgTipo">';
    }

    echo '<h2>| ' . $nombre . '</h2>
        </div>
        <div>
            <p>' . $descripcion . '</p>
        </div>
    </div>
</section>';
}

$id = isset($_GET["id"]) ? $_GET["id"] : "";
mostrarPokemonSeleccionado($id);
//$conn->close();
?>