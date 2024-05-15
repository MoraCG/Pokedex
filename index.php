<?php
include_once ("Configuration.php");


$Database = configuration::Database();

$path = isset($_GET['path']) ? $_GET['path'] : '';

switch ($path){

    default:

        $PokedexController=configuration::GetPokedexController();

        $PokedexController->getList();


        break;


}