<?php

class LoginController{

    private $presenter;
    private $model;

    public function __construct($PokemonModel, $Presenter)
    {
        $this->model = $PokemonModel;
        $this->presenter = $Presenter;
    }
    public function get(){
        if (isset($_POST["usuario"]) && isset($_POST["password"])) {
                $usuario = $_POST["usuario"];
                $password = $_POST["password"]; // No uses hashing en este paso si la base de datos almacena texto plano

                $esValido = $this->model->LogInconsulta($usuario, $password);

                if ($esValido) { // Si es válido, asignar la variable de sesión
                    $_SESSION["usuario"] = $usuario;
                    header("Location: index.php");
                    exit();
                } else {
                    // Si la autenticación falla, redirigir con un error
                    header("Location: index.php?controller=Pokedex&action=error");
                    exit();
                }
            } else {
                // Si no se proporcionan datos, redirigir con un error
                header("Location: index.php?controller=Pokedex&action=error");
                exit();
            }
    }
    
}

