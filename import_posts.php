<?php
require_once __DIR__ . '/app/Post.php'; 
require_once __DIR__ . '/app/Database.php';

function importPosts($directory)
{
    $post_model = new Post();

    if ($handle = opendir($directory)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry == '.' || $entry == '..') continue;

            $filePath = $directory . '/' . $entry;
            $content = file_get_contents($filePath);

            if (preg_match('/^Title:\s*(.+)$/m', $content, $titleMatch) && preg_match('/^Content:\s*(.+)$/ms', $content, $contentMatch)) {
                $title = trim($titleMatch[1]);
                $content = trim($contentMatch[1]);

                $post_model->createPost($title, $content); 
                echo "Imported: $title\n";
            }
        }
        closedir($handle);
    } else {
        echo "Failed to open directory.";
    }
}

importPosts(__DIR__ . '/posts'); 