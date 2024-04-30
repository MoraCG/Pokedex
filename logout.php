<?php
session_start();

// Limpiar las variables de sesión
$_SESSION = array();

// Cerrar la sesión
session_destroy();

// Redirigir a la página principal o de inicio de sesión
header("Location: paginaPrincipal.php");
exit; // Asegurarse de terminar el script después de la redirección
?>