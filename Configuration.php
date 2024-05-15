<?php
include_once ("Model/PokemonModel.php");
include_once ("Helper/DataBase.php");
include_once("view/header.html");
include_once("view/footer.html");
include_once ("Controller/PokedexController.php");

class Configuration
{

    private static function getConfig()
    {
        return parse_ini_file("config/config.ini");
    }

    public static function Database(){
     $config = self::getConfig();
     return new Database($config["servername"], $config["username"], $config["database"], $config["password"]);
 }

    public static function GetPokedexController()
    {
        $model =self::getPokemonModel();

        return new PokedexController( $model);
    }

    private static function getPokemonModel()

    {
        return new PokemonModel(self::Database());
    }


}