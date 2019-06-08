<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>
<div class="news">
    <h3>
        <?= htmlspecialchars($post->getTitle()) ?>
        <em><?= ($post->getCreationDate()) ?></em>
    </h3>
    <p>
        <?= nl2br(htmlspecialchars($post->getContent())) ?>
    </p>
</div>
<?php
foreach ($comments as $comment) {
    ?>
    <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> <?=$comment->getDate() ?></p>
    <p><?= nl2br(htmlspecialchars($comment->getContent())) ?></p>

    <em><a href="index.php?action=signalComment&amp;id=<?= $comment->getId() ?>">Signaler</a></em>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

