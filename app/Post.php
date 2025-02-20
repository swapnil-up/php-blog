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

    public function getComments($postId){
        $stmt= Database::connect()->prepare("SELECT * FROM comments WHERE post_id=? ORDER BY created_at DESC");
        $stmt->execute([$postId]);
        return $stmt->fetchAll();
    }

    public function addComment($postId, $author, $content){
        $stmt = Database::connect()->prepare("INSERT INTO comments (post_id, author, content) VALUES (?, ?, ?)");
        $stmt->execute([$postId, $author, $content]);
    }
}