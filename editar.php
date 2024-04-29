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

// Verificar si se han enviado los datos del formulario
if(isset($_POST['id_registro']) && isset($_POST['nuevo_valor'])) {
    // ID del registro que quieres editar
    $id_a_editar = $_POST['id_registro'];
    // Nuevo valor para el registro
    $nuevo_valor = $_POST['nuevo_valor'];

    // Consulta SQL para editar un registro
    $sql = "UPDATE pokemon SET columna = '$nuevo_valor' WHERE id = $id_a_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Registro editado correctamente";
        header("location:paginaAdmin.php");
        exit();
    } else {
        header("location:paginaPrincipal.php?error=5");
        exit();
    }
}

// Cerrar conexión
$conn->close();
?>
