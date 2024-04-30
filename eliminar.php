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

// Verificar si se ha enviado el ID del registro a eliminar
if(isset($_POST['eliminar'])) {

    // ID del registro que quieres eliminar
    $id_a_eliminar = $_POST['eliminar'];

    // Consulta SQL para eliminar un registro
    $sql = "DELETE FROM pokemon_tipo WHERE pokemon_id = $id_a_eliminar ; DELETE FROM pokemon WHERE id = $id_a_eliminar";

    if ($conn->multi_query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
        header("location:paginaPrincipal.php");
        exit();
    } else {
        header("location:paginaPrincipal.php?error=4");
        exit();

    }
}

// Cerrar conexión
$conn->close();
?>
