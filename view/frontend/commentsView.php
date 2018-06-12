<?php ob_start(); ?>

<div class="container admin add">
    <div class="row ">
        <br>
        <h1>Editions des Commentaires </h1>
        <br>
        <?php
while ($comment = $comments->fetch())
{
?>
            <form class="form" role="form" action="index.php?action=newComment&amp;id=
<?= $comment['id']?>" method="post" enctype="multipart/form-data">
                <input value="<?= htmlspecialchars($comment['auteur']) ?>"> le
                <input value="<?= htmlspecialchars($comment['commentaire_date_fr']) ?>">
                <?php if($comment['signaler']== '1') { ?> <a class=" btn btn-success" href="index.php?action=reability&amp;id=<?= htmlspecialchars($comment['id']) ?>"> désignaler </a>
                    <?php } else{  } ?>
                        <br/>
                        <div class="form-group">
                            <textarea id="comment" name="comment">
                                <?= nl2br(htmlspecialchars($comment['commentaire']))?>
                            </textarea><span class="help-inline"></span></div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button> <a class="btn btn-primary" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a><a class="btn btn-danger" href="index.php?action=eraseComment&amp;id=
<?= $comment['id']?>"><span class="glyphicon glyphicon-remove"> Supprimer</span></a> </div>
                        <br>
                        <br> </form>
            <?php
}
?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>