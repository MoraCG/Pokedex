<?php
session_start();
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
//ESTA BASE DE DATOS "test" NO EXISTE TOIDAVIA, NO LA PUDE CREAR
function consultarBD($usuario, $password){
    $conn = new mysqli_connect("localhost", "root", "", "test");
    if (!$conn) {
        die("Error al conectar la base de datos: " . mysqli_connect_error());
    }
    $sql = "SELECT 1 FROM 'Login' WHERE usuario = '$usuario' && password = '$password'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) == 1;
}
?>