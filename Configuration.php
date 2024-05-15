<?php

class Configuration
{

    private static function getConfig()
    {
        return parse_ini_file("config.ini");
    }

    public static function Database(){
     $config = self::getConfig();
     return new Database($config["servername"], $config["username"], $config["database"], $config["password"]);
 }





}