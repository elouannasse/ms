<?php 
require_once 'App/Controller/AController.php';        
require_once 'App/Controller/AuthController.php';

class Router {
    private $routes = [
        'GET' => [
            '/' => [AController::class, 'index'],
            '/register'=>[AuthController::class, 'registerView'],
            '/login'=>[AuthController::class, 'loginView'],
            '/delete' => [AController::class, 'delete'],
            '/edit' => [AController::class, 'edit'],
            '/add' => [AController::class, 'add'], 
        ],
        'POST' => [
            '/' => [AController::class, 'index'],
            '/register'=>[AuthController::class, 'register'],
            '/login'=>[AuthController::class, 'login'],
            '/delete' => [AController::class, 'delete'],
            '/update' => [AController::class, 'update'],
            '/store' => [AController::class, 'store'],
        ],
    ];

    public function dispatch($uri, $methode) { 
        try {
            if (!isset($this->routes[$methode][$uri])) {
                throw new Exception("Route non trouvée: $uri");
            }
            
            $class = $this->routes[$methode][$uri][0];
            $method = $this->routes[$methode][$uri][1];  
            $instance = new $class();  
            $instance->$method(); 
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
}