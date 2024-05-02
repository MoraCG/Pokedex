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
    $query_tipos = "SELECT T.nombre FROM pokemon P JOIN pokemon_tipo PoT ON P.id = PoT.pokemon_id JOIN Tipo T ON PoT.tipo_id = T.id WHERE P.id = $editar";
    $resultado_tipos = mysqli_query($conn, $query_tipos);
    $tipo = [];
    while($fila_tipo = mysqli_fetch_assoc($resultado_tipos)){
        $tipo[] = $fila_tipo['nombre'];
    }
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
        <img src="pokemon/' . $imagen . '" alt="Imagen del Pokémon"><br>
        <label for="nombre">Nombre del pokémon:</label>
        <input type="text" name="nombre" id="nombre" value="' . $nombre . '"><br>
        <label for="numeroPokemon">Numero:</label>
        <input type="number" id="numeroPokemon" name="numeroPokemon" value="' . $numero . '"><br>
        <label for="tipoPokemon">Tipo de pokémon</label><br>';

        $tipos_disponibles = ["normal", "fuego", "agua", "planta", "eléctrico", "hielo", "lucha", "veneno", "tierra", "volador", "psíquico", "bicho", "roca", "fantasma", "dragón"];
        foreach ($tipos_disponibles as $tipo_disponible) {
            echo '<label><input type="checkbox" name="tipos[]" value="' . $tipo_disponible . '"' . (in_array(strtolower($tipo_disponible), $tipo) ? ' checked' : '') . '>' . ucfirst($tipo_disponible) . '</label><br>';
        }

        echo '<label for="descripcion">Una breve descripción:</label><br>
        <textarea name="descripcion" id="descripcion" cols="20" rows="3">' . $descripcion . '</textarea><br>
        <input type="submit" value="Enviar" name="submit">
    </form>';

    include 'footer.html';
}

?>
</body>
</html>
