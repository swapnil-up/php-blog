<?php require 'layout.php'; ?>

<h1><?= htmlspecialchars($post['title']); ?></h1>
<p><?= nl2br(htmlspecialchars($post['content'])); ?></p>

<a href="?route=/">Back to home</a>