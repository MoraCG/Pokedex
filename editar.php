<?php
$servername = "localhost"; // Host de la base de datos
$username = "root"; // Nombre de usuario
$password = ""; // Contraseña predeterminada de MySQL en XAMPP
$database = "test"; // Nombre de la base de datos que quieres conectar

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$id_a_editar = isset($_GET['editar']) ? $_GET['editar'] : 0;
$nuevoNombre = $_POST['nombre'];
$nuevoNumero = $_POST['numeroPokemon'];
$nuevaDescripcion = $_POST['descripcion'];
$nuevosTipos = isset($_POST['tipos']) ? $_POST['tipos'] : array();

// Consulta SQL para editar un registro
$sql = "UPDATE pokemon SET numero = ?, nombre = ?, descripcion = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

// Vincular los parámetros
$stmt->bind_param("issi", $nuevoNumero, $nuevoNombre, $nuevaDescripcion, $id_a_editar);
$stmt->execute();


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