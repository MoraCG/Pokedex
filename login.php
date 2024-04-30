<?php
session_start(); // Iniciar sesión

// Verificar si se han enviado datos de usuario y contraseña
if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"]; // No uses hashing en este paso si la base de datos almacena texto plano

    $esValido = consultarBD($usuario, $password);

    if ($esValido) { // Si es válido, asignar la variable de sesión
        $_SESSION["usuario"] = $usuario;
        header("Location: paginaPrincipal.php");
        exit();
    } else {
        // Si la autenticación falla, redirigir con un error
        header("Location: paginaPrincipal.php?error=2");
        exit();
    }
} else {
    // Si no se proporcionan datos, redirigir con un error
    header("Location: paginaPrincipal.php?error=3");
    exit();
}

// Función para consultar en la base de datos
function consultarBD($usuario, $password) {
    $conn = new mysqli("localhost", "root", "", "test");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para verificar usuario y contraseña
    $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND password = '$password'";
    $result = $conn->query($sql);

    // Si se encuentra un resultado, es válido
    return $result->num_rows == 1;
}

$conn->close(); // Cerrar la conexión al final
?>