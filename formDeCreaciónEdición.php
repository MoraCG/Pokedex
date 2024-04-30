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
    <title>Formulario</title>
</head>
<body>
<?php
include 'header.html';
$editar = floatval($_GET['editar']);
$accion = "";
if ($editar == 0) {//si es 0 es para crear un pokémon
    $accion = 'action="crear.php"';
} else {
    $accion = 'action="editar.php?editar=' . $editar . '"';
}
echo '<form ' . $accion . ' method="post" enctype="multipart/form-data" class="w3-center">
    <label for="fotoPokemon">Foto:</label>
    <input type="file" name="fotoPokemon" id="fotoPokemon"><br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value=""><br>
    <label for="numeroPokemon">Numero:</label>
    <input type="number" id="numeroPokemon" name="numeroPokemon"><br>
    <label for="tipoPokemon">Tipo de pokémon</label>
    <label><input type="checkbox" name="tipos[]" value="Normal"> Normal</label><br>
    <label><input type="checkbox" name="tipos[]" value="Fuego"> Fuego</label><br>
    <label><input type="checkbox" name="tipos[]" value="Agua"> Agua</label><br>
    <label><input type="checkbox" name="tipos[]" value="Planta"> Planta</label><br>
    <label><input type="checkbox" name="tipos[]" value="Eléctrico"> Eléctrico</label><br>
    <label><input type="checkbox" name="tipos[]" value="Hielo"> Hielo</label><br>
    <label><input type="checkbox" name="tipos[]" value="Lucha"> Lucha</label><br>
    <label><input type="checkbox" name="tipos[]" value="Veneno"> Veneno</label><br>
    <label><input type="checkbox" name="tipos[]" value="Tierra"> Tierra</label><br>
    <label><input type="checkbox" name="tipos[]" value="Volador"> Volador</label><br>
    <label><input type="checkbox" name="tipos[]" value="Psíquico"> Psíquico</label><br>
    <label><input type="checkbox" name="tipos[]" value="Bicho"> Bicho</label><br>
    <label><input type="checkbox" name="tipos[]" value="Roca"> Roca</label><br>
    <label><input type="checkbox" name="tipos[]" value="Fantasma"> Fantasma</label><br>
    <label><input type="checkbox" name="tipos[]" value="Dragón"> Dragón</label><br>
    <label for="descripcion">Una breve descripción:</label>
    <textarea name="descripcion" id="descripcion" cols="15" rows="3"></textarea>
    <input type="submit" value="Enviar" name="submit">
</form>';

include 'footer.html';
?>
</body>
</html>
