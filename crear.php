<?php
$servername = "localhost"; // Host de la base de datos
$username = "root"; // Nombre de usuario
$password = ""; // Contraseña predeterminada de MySQL en XAMPP
$database = "test"; // Nombre de la base de datos que quieres conectar
require_once 'funciones.php';
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$numero = $_POST['numeroPokemon'];
$descripcion = $_POST['descripcion'];
$tipos = isset($_POST['tipos']) ? $_POST['tipos'] : array();

// Insertar el nuevo Pokémon en la tabla pokemon
$sql = "INSERT INTO pokemon (nombre, numero, descripcion) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $nombre, $numero, $descripcion);
$stmt->execute();
$new_pokemon_id = $stmt->insert_id; // Obtener el id del nuevo Pokémon insertado
$stmt->close();

// Insertar los tipos del Pokémon en la tabla pokemon_tipo
foreach ($tipos as $tipo) {
    // Obtener el ID del tipo
    $tipo_id = obtenerIdTipo($conn, $tipo);

    // Insertar la relación en la tabla pokemon_tipo
    $sql = "INSERT INTO pokemon_tipo (pokemon_id, tipo_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $new_pokemon_id, $tipo_id);
    $stmt->execute();
    $stmt->close();
}

// Cerrar la conexión
$conn->close();

header("location:paginaPrincipal.php");

exit();
