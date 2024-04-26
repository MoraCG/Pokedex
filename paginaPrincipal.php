<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style/estilosVistas.css">
    <link rel="icon" href="/img/pokebolaLogo.png" type="image/png">
    <title>Home</title>
</head>
<body class="w3-light-grey">
<div class="w3-container w3-center" id="contenedorHeader">
    <div id="header">
        <?php
        include "header.html";
        ?>
    </div>
    <div id="user">
        <form action="login.php" method="post">
            Usuario:<input type="text" name="usuario">
            Password:<input type="text" name="password">
            <button type="submit">Log in</button></form>
    </div>
</div>

<div class="w3-container w3-center w3-margin">
    <form action="#" method="get">
        <input type="text" name="buscador" id="buscador" placeholder="Ingrese nombre, tipo o numero de pokémon">
        <input type="submit" name="buscar" id="buscar" value="¿Quién es ese pokemon?">
    </form>
</div>
<?php
if(isset($_GET["error"])){
    switch($_GET["error"]){
        case 1:
            echo"<div style='color:white;background-color:red'>USUARIO NO ENCONTRADO</div>";
            break;
        case 2:
            echo"<div style='color:white;background-color:red'>USUARIO O PASSWORD INVALIDOS</div>";
            break;
        case 3:
            echo"<div style='color:white;background-color:red'>USUARIO NO REGISTRADO</div>";
            break;

    }
}
include "ConsultarBdPokemon.php";
include "footer.html";
?>
</body>
</html>