<?php
include_once ("Configuration.php");




$controller = $_GET['controller'] ?? '';
$action = $_GET['action'] ?? 'get';

$router =configuration::getRouter();
$router->route($controller,$action);
