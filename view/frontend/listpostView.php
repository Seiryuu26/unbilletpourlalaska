<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Par Jean Rocheforte</h1>
<p>Derniers billets du blog :</p>

<?php
foreach($posts as $post )
{
    $content=htmlspecialchars($post->getContent());
    if (strlen($content)>100)
    {
        $content=substr($content, 0, 100);
        $dernier_mot=strrpos($content," ");
        $content=substr($content,0,$dernier_mot);
        $content.="<a href=\"index.php?action=post&amp;id=".($post->getId())."\"> lire la suite...</a>";
    }
    ?>

    <div class="news">
        
        <h3>

            <a href="index.php?action=post&amp;id=<?= ($post->getId())?>"><?= htmlspecialchars($post->getTitle()) ?></a>
            <em><?= ($post->getCreationDate())?></em>
            <?=  "par " . ($post->getAuthor()->getFullname())?>
        </h3>
        
        <p>
            <?= nl2br($content) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= ($post->getId()) ?>">Commentaires</a></em>
            
        </p>
    </div>


<?php
}
?>

 <?php for ( $i=1 ; $i <=($nbpages[0]/3+1); $i++)
     echo"<a href=\"/index.php?page=$i\">page $i</a> ";
  ?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


