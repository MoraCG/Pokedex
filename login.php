<?php
if(isset($_POST["usuario"]) && isset($_POST["password"])){
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $esValido = consultarBD($usuario, $password);
    if($esValido){
        $_SESSION["usuario"] = $usuario;

        header("location:paginaAdmin.php");
        exit();
    }else{
        header("location:paginaPrincipal.php?error=2");
        exit();
    }
}else{
    header("location:paginaPrincipal.php?error=3");
    exit();
}

function consultarBD($usuario, $password){

    // Crear conexión
    $conn = new mysqli("localhost", "root", "", "test");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) == 1;
}
$conn->close();
?>