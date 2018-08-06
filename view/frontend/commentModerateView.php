<?php ob_start(); ?>


<div class="container admin add">
    <div class="row ">
        <br>
        <h1>Commentaires signalés</h1>
        <br>
        <?php
while ($comment = $comments->fetch())
{
?>
            <form class="form" role="form" action="index.php?action=newComment&amp;id=
<?= $comment['id']?>" method="post" enctype="multipart/form-data">
                <input value="<?= htmlspecialchars($comment['member']) ?>"> le
                <input value="<?= htmlspecialchars($comment['comment_date_fr']) ?>"> <a class=" btn btn-success" href="index.php?action=reability&amp;id=<?= htmlspecialchars($comment['id']) ?>"> désignaler </a>
                <br/>
                <div class="form-group">
                    <textarea id="comment" name="comment">
                        <?= nl2br(htmlspecialchars($comment['comment']))?>
                    </textarea><span class="help-inline"></span></div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button> <a class="btn btn-primary" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a><a class="btn btn-danger" href="index.php?action=eraseComment&amp;id=
<?= $comment['id']?>"><span class="glyphicon glyphicon-remove"> Supprimer</span></a> </div>
                <br>
                <br> </form>
        <table>
        <h1><strong>Modifier les commentaires </strong></h1>
        <TABLE BORDER="1">
        <tr>
        <th>num&eacute;ros commentaires signal&eacute;s</th>
        <th>effacer</th>
        <th>mod&eacute;rer</th>
        </tr>
        <tr>
        <th>commentaire1</th>
        <td>commentaire1</td>
        <td><a class="btn btn-primary" href="index.php?action=eraseComment&amp">effacer</a></td>
        <td><a class="btn btn-primary" href="index.php?action=moderateComment&amp">mod&eacute;rer</a></td>
        </tr>
        <tr>  
        <th>commentaire2</th> 
        <td>commentaire2</td>
        <td><a class="btn btn-primary" href="index.php?action=eraseComment&amp">effacer</a></td>
        <td><a class="btn btn-primary" href="index.php?action=moderateComment&amp">mod&eacute;rer</a></td>
        </tr>
        <tr>  
        <th>commentaire3</th> 
        <td>commentaire3</td>
        <td><a class="btn btn-primary" href="index.php?action=eraseComment&amp">effacer</a></td>
        <td><a class="btn btn-primary" href="index.php?action=moderateComment&amp">mod&eacute;rer</a></td>
        </tr>
        </table>
            <?php
}
?>
    </div>
</div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>