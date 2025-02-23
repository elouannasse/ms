<?php
require_once __DIR__ . "/../Models/User.php";

class AuthController {
    public function loginView() {
        require __DIR__ . "/../../resources/Views/login.php";
    }

    public function registerView() {
        require __DIR__ . "/../../resources/Views/register.php";
    }

    public function login() {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            
            $user = new User();  // Créer une instance
            $message = $user->login($_POST['email'], $_POST['password']);

            if($message == true) {
                header("Location: /");
                exit();
            } else {
                $_SESSION["message"]=$message;
                header("Location: /login?error=1");
                exit();
            }
        }
    }

    public function register() {
        echo "hello";

        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

            $user = new User();  // Créer une instance
            $message=$user->register($_POST['name'], $_POST['email'], $_POST['password']);
            if($message == "coneccted") {
 
                header("Location: /login");
                exit();
            } else {
                $_SESSION["message"]=$message;

                header("Location: /register?error=1");
                exit();
            }
        }
    }
}