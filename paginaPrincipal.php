<?php
session_start();
?>

        <?php
        if (!isset($_SESSION["usuario"])) {
            // Formulario de inicio de sesión si no está autenticado
            ?>
            <form action="login.php" method="post" id="userForm">
                Usuario:<input type="text" name="usuario" id="usuario">
                Password:<input type="password" name="password" id="password"><br><br>
                <input type="submit" value="Log in">
            </form>
            <?php
        } else {
            // Botón para cerrar sesión si el usuario está autenticado
            echo "<h2>Bienvenido, " . $_SESSION["usuario"] . "</h2>";
            ?>
            <form action="logout.php" method="post">
                <input type="submit" value="Cerrar Sesión">
            </form>
            <?php
        }
        ?>


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
        case 4:
            echo"<div style='color:white;background-color:red'>ERROR AL ELIMINAR EL POKEMON</div>";
            break;
        case 5:
            echo"<div style='color:white;background-color:red'>ERROR AL EDITAR EL POKEMON</div>";
            break;
    }
}

if (isset($_SESSION["usuario"])) {
    echo "<form action='formDeCreaciónEdición.php' method='get' class='w3-center'><button type='submit' name='editar' id='crearPokemon' value='0'>Crear Pokémon</button></form>";
}

?>
<?php
function mostrarPokemon($pokemonData)
{

    if (!empty($pokemonData)) {
        echo "<div class='w3-margin'>";
        echo "<table class='w3-table w3-bordered'>";
        echo "<thead>";
        echo "<tr class='w3-dark-grey'>";
        echo "<th>Imagen</th>";
        echo "<th>Tipo</th>"; // Columna para imágenes de tipos
        echo "<th>Número</th>";
        echo "<th>Nombre</th>";
        if (isset($_SESSION["usuario"])) {
            echo "<th>Modificaciones</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($pokemonData as $row) {
            echo "<tr>";
            echo "<td><img src='img/pokemon/" . $row["imagen"] . "' alt='imagen' class='imagenTabla' style='width: 64px; height: auto;'></td>";

            // Mostrar las imágenes para los tipos
            echo "<td>"; // Apertura de celda para imágenes de tipo
            $tipos = explode(',', $row["tipos"]); // Convertir la cadena de texto en un arreglo

            foreach ($tipos as $tipo) {
                // Mostrar la imagen para cada tipo
                echo "<img src='img/TipoPokemon/tipo_" . trim($tipo) . ".png' alt='" . trim($tipo) . "' style='width: auto; height: auto;' />";
            }

            echo "</td>"; // Cierre de celda para imágenes de tipo

            echo "<td>" . $row["numero"] . "</td>";
            echo  "<td><a href='/index.php?controller=paginaDeVisualizacion&id=" . $row["id"] . "'>" . $row["nombre"] . "</a></td>";
            if (isset($_SESSION["usuario"])) {
                echo "<td class='btn-group'>"; // Contenedor para los botones
                echo "<form action='eliminar.php' method='post' style='display: inline-block;'>";
                echo "<button type='submit' name='eliminar' value='" . $row["id"] . "' class='btn btn-danger'>Eliminar</button>";
                echo "</form>";

                echo "<form action='formDeCreaciónEdición.php' method='get' style='display: inline-block;'>";
                echo "<button type='submit' name='editar' value='" . $row["id"] . "' class='btn'>Editar</button>";
                echo "</form>";
            }
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "No se encontraron Pokémon ";


    }

}
?>
