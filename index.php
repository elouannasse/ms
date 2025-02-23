<?php 
require_once 'Route/Router.php' ;
require_once 'App/Controller/AController.php' ;
require_once 'App/Controller/AuthController.php' ;
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$methode = $_SERVER['REQUEST_METHOD'];
$instance = new Router() ;
$instance->dispatch($uri,$methode) ; 