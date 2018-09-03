<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post->getTitle()) ?>
        <em><?= ($post->getDate()) ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post->getContent())) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="member" name="author" />
    </div>
    <div>
        <label for="content">Commentaire</label><br />
        <textarea id="content" name="content"></textarea>
    </div>
    <div>
        <input name="postId" type="hidden" value="<?=$_GET['id'] ?>" />
        <input type="submit" />
    </div>
</form>
<?php
while ($comment = $comments->fetch())
    {
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong>  <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>

<em><a href="index.php?action=signalComment&amp;id=<?= $comment['id'] ?>">Signaler</a></em>


<?php
    }
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>