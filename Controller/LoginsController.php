<?php

class LoginsController
{

    private $presenter;
    private $model;

    public function __construct($PokemonModel, $Presenter)
    {
        $this->model = $PokemonModel;
        $this->presenter = $Presenter;
    }


    public function get()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["usuario"]) && isset($_POST["password"])) {
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            // Realizar la validación del usuario y contraseña
            if ($this->model->LogInconsulta($usuario, $password)) {
                $_SESSION["usuario"] = $usuario;
            } else {
                $_SESSION["error_login"] = "Usuario o contraseña incorrectos. presta atencion mora";
            }
        } else {
            // Si no se enviaron credenciales, establecer el mensaje de error
            $_SESSION["error_login"] = "Por favor, ingresa tus credenciales.";
        }

        // Redirigir a la página principal del Pokedex
        header("Location: index.php?controller=Pokedex&action=get");
        exit();
    }


    public function logout()
    {


        session_unset();
        session_destroy();


        header("Location: index.php?controller=Pokedex&action=get");
        exit();
    }

}



