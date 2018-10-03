<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Par Jean Rocheforte</h1>
<p>Derniers billets du blog :</p>

<?php
while ($data = $posts->fetch())
foreach($posts as $post )
{
?>
    <div class="news">
        
        <h3>
            <?= htmlspecialchars($data->getTitle()) ?>
            <em><?= ($data->getDate())?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data->getContent()) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= ($data->getId()) ?>">Commentaires</a></em>
            
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>