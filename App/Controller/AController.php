<?php

require __DIR__ . "/../Models/Articale.php";

class AController {
    private $article;

    public function __construct() {
        $this->article = new Articale();
    }

    public function index() {
        $articles = $this->article->getAllarticle();
        require __DIR__ . "/../../resources/Views/home.php"; 
    }

    public function delete() {  // doit être 'delete' et non 'delet'
        if (isset($_GET['id'])) {
            $article = new Articale();
            $article->delete($_GET['id']);
            header('Location: /');
            exit;
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $article = new Articale();
            $articleData = $article->edit($_GET['id']);
            require __DIR__ . "/../../resources/Views/edit.php"; 
        }
    }
    public function update() {
        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description'])) {
            $article = new Articale();
            $article->update($_POST['id'], $_POST['title'], $_POST['description']);
            header('Location: /');
            exit;
        }

    }
    public function add() {
        require __DIR__ . "/../../resources/Views/add.php";
    }
    
    public function store() {
        if (isset($_POST['title']) && isset($_POST['description'])) {
            $article = new Articale();
            $article->create($_POST['title'], $_POST['description']);
            header('Location: /');
            exit;
        }
    }
}