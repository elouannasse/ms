<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $database = "mvca";
    private $password = "";
    private $pdo;
    private $dsn;

    public  function __construct() {
       
        $this->dsn = "mysql:host=$this->host;dbname=$this->database";
    }

    public function getConnection() {
   
        if ($this->pdo == null) {
     
                
                $this->pdo = new PDO($this->dsn, $this->username, $this->password);
        }
        return $this->pdo;
    }
}
$dp = new Database();
$dp->getConnection();
?>
