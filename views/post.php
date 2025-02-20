<?php require 'layout.php'; ?>

<h1><?= htmlspecialchars($post['title']); ?></h1>
<p><?= nl2br(htmlspecialchars($post['content'])); ?></p>

<a href="?route=/">Back to home</a>


<h2>Comments</h2>
<?php
$comments = $post_model->getComments($post['id']);
foreach ($comments as $comment):
?>
    <div>
        <strong><?= htmlspecialchars($comment['author']); ?>:</strong>
        <p><?= nl2br(htmlspecialchars($comment['content'])); ?></p>
    </div>
<?php endforeach; ?>

<h3>Leave a Comment</h3>
<form action="?route=/add_comment" method="POST">
    <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
    <input type="text" name="author" placeholder="Your Name" required>
    <textarea name="content" placeholder="Your Comment" required></textarea>
    <button type="submit">Submit</button>
</form>
<a href="?route=/">Back to home</a>