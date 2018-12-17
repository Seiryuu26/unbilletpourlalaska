<?php ob_start(); ?>

<div class="container admin add">
    <div class="container admin add">
        <?php
        if (isset($_SESSION['message']) AND $_SESSION['message']!== NULL ){
            echo '<div class="alert alert-primary" role="alert">';
            echo $_SESSION['message'] ;
            echo '</div>';
        }


        ?>

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
                <input value="<?= htmlspecialchars($comment['author']) ?>"> le
                <input value="<?= htmlspecialchars($comment['date']) ?>">
                <?php if($comment['signaled']== '1') { ?> <a class=" btn btn-success" href="index.php?action=reability&amp;id=<?= htmlspecialchars($comment['id']) ?>"> désignaler </a>
                    <?php } else{  } ?>
                        <br/>
                        <div class="form-group">
                            <textarea id="comment" name="content">
                                <?= nl2br(htmlspecialchars($comment['content']))?>
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
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="g-recaptcha" data-sitekey="6Ld32l4UAAAAADM4l879y-fNZ8br4c_I03InyQmH"></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>