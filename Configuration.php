<?php
include_once ("Model/PokemonModel.php");
include_once ("Helper/DataBase.php");

include_once ("Controller/PokedexController.php");
include_once ("Helper/Router.php");
include_once ("Helper/presenter.php");
include_once ("Helper/MustachePresenter.php");
include_once ("vendor/mustache/src/Mustache/Autoloader.php");

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


        return new PokedexController( self::getPokemonModel(),self::getPresenter());
    }

    private static function getPokemonModel()

    {
        return new PokemonModel(self::Database());
    }
    public static function getRouter(){
        return new Router();
    }

    private static function getPresenter()
    {
        //falta cambiar el presenter por un presenter mustache
        return new Presenter();
    }

}