<?php 
require_once __DIR__ . "/../../config/Database.php";
class User {
    private $id;
    private $nom;
    private $email;
    private $password;
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function getUserByEmail($email) {
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                $this->id = $user['id'];
                $this->nom = $user['nom'];
                $this->email = $user['email'];
                $this->password = $user['password'];
                return true;
            }
            return "creadentiols inccorect";
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function login($email, $password) {
        try {
            $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nom'];
                return true;
            }
            return "creadentiols inccorect";
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function register($name, $email, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $query = "INSERT INTO users (name, email, password) VALUES (:nom, :email, :password)";
            $stmt = $this->conn->prepare($query);
            
            $stmt->execute([
                'nom' => $name,
                'email' => $email,
                'password' => $hashedPassword
            ]);
            return "coneccted";
        } catch(PDOException $e) {
            return $e;
        }
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
}