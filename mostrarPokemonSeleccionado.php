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
    // Obtener el nombre del Pokémon
    $resultNombre = $conn->query("SELECT nombre FROM pokemon WHERE id = " . $id);
    $rowNombre = $resultNombre->fetch_assoc();
    $nombre = $rowNombre['nombre'];

    // Obtener la imagen del Pokémon
    $resultImagen = $conn->query("SELECT imagen FROM pokemon WHERE id = " . $id);
    $rowImagen = $resultImagen->fetch_assoc();
    $imagen = $rowImagen['imagen'];

    // Obtener la descripción del Pokémon
    $resultDescripcion = $conn->query("SELECT descripcion FROM pokemon WHERE id = " . $id);
    $rowDescripcion = $resultDescripcion->fetch_assoc();
    $descripcion = $rowDescripcion['descripcion'];

    // Obtener los tipos del Pokémon
    $resultTipos = $conn->query("SELECT T.nombre FROM pokemon P 
                   JOIN pokemon_tipo PoT ON P.id = PoT.pokemon_id
                   JOIN Tipo T ON PoT.tipo_id = T.id
                   WHERE P.id = " . $id);
    $tipos = "";

    // Imprimir la sección del Pokémon
    echo '<section class="w3-center" id="contenedorInfo">
    <div class="w3-margin" id="imagenInfo">
        <img src="pokemon/' . $imagen . '" alt="Imagen Pokémon seleccionado" id="imgVisualizacion">
    </div>
    <div class="w3-margin" id="info">
        <div id="tipoNombre">';
    // foreach ($tipos as $tipo) {
    echo '<img src="#" alt="Tipo" id="imgTipo">';
    //  };
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
$conn->close();
?>