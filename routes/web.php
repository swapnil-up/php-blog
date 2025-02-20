<?php

require_once __DIR__.'/../app/Database.php';
require_once __DIR__.'/../app/Post.php';

$post_model= new Post();

$route= $_GET['route']??'/';

switch ($route){
    case '/':
        $posts=$post_model->getAllPosts();
        require __DIR__.'/../views/home.php';
        break;
    case '/post':
        if (isset($_GET['id'])){
            $post= $post_model->getPostById($_GET['id']);
            if ($post){
                require __DIR__ . '/../views/post.php';
            } else {
                echo "Post not found";
            }
        }else {
            echo "Post id not passed";
        }
        break;

    case '/add_comment':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['post_id'];
            $author = trim($_POST['author']);
            $content = trim($_POST['content']);

            if (!empty($author) && !empty($content)) {
                $post_model->addComment($postId, $author, $content);
                header("Location: ?route=/post&id=$postId");
                exit;
            } else {
                echo "All fields are required.";
            }
        }
        break;
    default:
        echo "404 not found";
    }