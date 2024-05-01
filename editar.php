<?php
$servername = "localhost"; // Host de la base de datos
$username = "root"; // Nombre de usuario
$password = ""; // Contraseña predeterminada de MySQL en XAMPP
$database = "test"; // Nombre de la base de datos que quieres conectar
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);
require_once 'funciones.php';
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$id_a_editar = isset($_GET['editar']) ? $_GET['editar'] : 0;
$nuevoNombre = $_POST['nombre'];
$nuevoNumero = $_POST['numeroPokemon'];
$nuevaDescripcion = $_POST['descripcion'];
$nuevosTipos = isset($_POST['tipos']) ? $_POST['tipos'] : array();

// Consulta SQL para eliminar los tipos actuales del Pokémon
$sql_delete_tipos = "DELETE FROM pokemon_tipo WHERE pokemon_id = ?";
$stmt_delete_tipos = $conn->prepare($sql_delete_tipos);
$stmt_delete_tipos->bind_param("i", $id_a_editar);
$stmt_delete_tipos->execute();

// Consulta SQL para editar un registro
$sql = "UPDATE pokemon SET numero = ?, nombre = ?, descripcion = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

// Vincular los parámetros
$stmt->bind_param("issi", $nuevoNumero, $nuevoNombre, $nuevaDescripcion, $id_a_editar);
$stmt->execute();

// Consulta SQL para insertar los nuevos tipos del Pokémon
$sql_insert_tipos = "INSERT INTO pokemon_tipo (pokemon_id, tipo_id) VALUES (?, ?)";
$stmt_insert_tipos = $conn->prepare($sql_insert_tipos);

foreach ($nuevosTipos as $tipo) {
    // Obtener el ID del tipo
    $tipo_id = obtenerIdTipo($conn, $tipo);

    // Insertar el nuevo tipo
    $stmt_insert_tipos->bind_param("ii", $id_a_editar, $tipo_id);
    $stmt_insert_tipos->execute();
}

if ($stmt->affected_rows > 0) {
    echo "Registro editado correctamente";
    header("location:paginaPrincipal.php");
    exit();
} else {
    header("location:paginaPrincipal.php?error=5");
    exit();
}

// Cerrar conexión
$conn->close();
?>