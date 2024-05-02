<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style/estilosForm.css">
    <link rel="stylesheet" href="style/estilosVistas.css">
    <link rel="icon" href="/img/pokebolaLogo.png" type="image/png">
    <title>Formulario</title>
</head>
<body class="w3-light-gray">
<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "test");

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}else{
    include 'header.html';
    $editar = floatval($_GET['editar']);
    $accion = "";
    $query1 = "SELECT T.nombre FROM pokemon P JOIN pokemon_tipo PoT ON P.id = PoT.pokemon_id JOIN Tipo T ON PoT.tipo_id = T.id WHERE P.id = $editar";
    $resultado1 = mysqli_query($conn, $query1);
    $tipo = mysqli_fetch_assoc($resultado1)['nombre'];
    $query = "SELECT imagen, numero, nombre, descripcion FROM pokemon WHERE id = $editar";
    $resultado = mysqli_query($conn, $query);

    if ($editar == 0) {//si es 0 es para crear un pokémon
        echo '<h2>Crear Pokémon</h2>';
        $accion = 'action="crear.php"';
    } else {
        echo '<h2>Editar Pokémon</h2>';
        $accion = 'action="editar.php?editar=' . $editar . '"';
        $fila = mysqli_fetch_assoc($resultado);
        $imagen = $fila['imagen'];
        $numero = $fila['numero'];
        $nombre = $fila['nombre'];
        $descripcion = $fila['descripcion'];
    }
    echo '<form ' . $accion . ' method="post" enctype="multipart/form-data" class="w3-margin">
        <label for="fotoPokemon">Foto:</label>
        <input type="file" name="fotoPokemon" id="fotoPokemon"><br>
        <img src="' . $imagen . '" alt="Imagen del Pokémon"><br>
        <label for="nombre">Nombre del pokémon:</label>
        <input type="text" name="nombre" id="nombre" value="' . $nombre . '"><br>
        <label for="numeroPokemon">Numero:</label>
        <input type="number" id="numeroPokemon" name="numeroPokemon" value="' . $numero . '"><br>
        <label for="tipoPokemon">Tipo de pokémon</label><br>
        <label><input type="checkbox" name="tipos[]" value="Normal"' . ($tipo == "Normal" ? ' checked' : '') . '> Normal</label><br>
        <label><input type="checkbox" name="tipos[]" value="Fuego"' . ($tipo == "Fuego" ? ' checked' : '') . '> Fuego</label><br>
        <label><input type="checkbox" name="tipos[]" value="Agua"' . ($tipo == "Agua" ? ' checked' : '') . '> Agua</label><br>
        <label><input type="checkbox" name="tipos[]" value="Planta"' . ($tipo == "Planta" ? ' checked' : '') . '> Planta</label><br>
        <label><input type="checkbox" name="tipos[]" value="Eléctrico"' . ($tipo == "Eléctrico" ? ' checked' : '') . '> Eléctrico</label><br>
        <label><input type="checkbox" name="tipos[]" value="Hielo"' . ($tipo == "Hielo" ? ' checked' : '') . '> Hielo</label><br>
        <label><input type="checkbox" name="tipos[]" value="Lucha"' . ($tipo == "Lucha" ? ' checked' : '') . '> Lucha</label><br>
        <label><input type="checkbox" name="tipos[]" value="Veneno"' . ($tipo == "Veneno" ? ' checked' : '') . '> Veneno</label><br>
        <label><input type="checkbox" name="tipos[]" value="Tierra"' . ($tipo == "Tierra" ? ' checked' : '') . '> Tierra</label><br>
        <label><input type="checkbox" name="tipos[]" value="Volador"' . ($tipo == "Volador" ? ' checked' : '') . '> Volador</label><br>
        <label><input type="checkbox" name="tipos[]" value="Psíquico"' . ($tipo == "Psíquico" ? ' checked' : '') . '> Psíquico</label><br>
        <label><input type="checkbox" name="tipos[]" value="Bicho"' . ($tipo == "Bicho" ? ' checked' : '') . '> Bicho</label><br>
        <label><input type="checkbox" name="tipos[]" value="Roca"' . ($tipo == "Roca" ? ' checked' : '') . '> Roca</label><br>
        <label><input type="checkbox" name="tipos[]" value="Fantasma"' . ($tipo == "Fantasma" ? ' checked' : '') . '> Fantasma</label><br>
        <label><input type="checkbox" name="tipos[]" value="Dragón"' . ($tipo == "Dragón" ? ' checked' : '') . '> Dragón</label><br>
        <label for="descripcion">Una breve descripción:</label><br>
        <textarea name="descripcion" id="descripcion" cols="20" rows="3">' . $descripcion . '</textarea><br>
        <input type="submit" value="Enviar" name="submit">
    </form>';

    include 'footer.html';
}

?>
</body>
</html>
