<?php

require __DIR__ . "/../../config/Database.php";
class Articale
{
    public function getAllarticle() 
    {
        $db = new Database;
        $conn = $db->getConnection();
        $query = "SELECT * FROM article";
        $stmt = $conn->prepare(query: $query);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        return $articles; 

    }
    public function delete($id) 
{
    $db = new Database;
    $conn = $db->getConnection();
    
    $query = "DELETE FROM article WHERE id = :id";
    $stmt = $conn->prepare(query: $query);
    $stmt->execute(['id' => $id]);
    
    return true;
}

public function edit ($id) {
    $db = new Database;
    $conn = $db->getConnection();
    
    $query = "SELECT * FROM article WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute(['id' => $id]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update($id, $title, $description) {
    $db = new Database;
    $conn = $db->getConnection();
    
    $query = "UPDATE article SET title = :title, description = :description WHERE id = :id";
    $stmt = $conn->prepare($query);
    
    return $stmt->execute([
        'id' => $id,
        'title' => $title,
        'description' => $description
    ]);
}

public function create($title, $description) {
    $db = new Database;
    $conn = $db->getConnection();
    
    $query = "INSERT INTO article (title, description) VALUES (:title, :description)";
    $stmt = $conn->prepare($query);
    
    return $stmt->execute([
        'title' => $title,
        'description' => $description
    ]);
}


}


