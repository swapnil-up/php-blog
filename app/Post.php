<?php
require_once __DIR__.'/../app/Database.php';

class Post{
    private $pdo;

    public function __construct(){
        $this->pdo=Database::connect();
    }

    public function getAllPosts(){
        $stmt= $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function getPostById($id){
        $stmt= $this->pdo->prepare("SELECT * FROM posts WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function createPost($title, $content){
        $stmt= $this->pdo->prepare("INSERT INTO posts (title, content) VALUES (? ,?)");
        $stmt->execute([$title, $content]);
    }
}