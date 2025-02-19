<?php require 'layout.php'; ?>

<h1>My Simple PHP Blog</h1>
<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="?route=/post&id=<?= $post['id']; ?>">
                <?= htmlspecialchars($post['title']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>