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
    }
    ?>

    <div class="news">
        
        <h3>

            <a href="index.php?action=post&amp;id=<?= ($post->getId())?>"><?= htmlspecialchars($post->getTitle()) ?></a>
            <em><?= ($post->getCreationDate())?></em>
            <?=  "par " . ($post->getAuthor()->getFullname())?>
        </h3>

        <div class="content">
            <p>
                <?= nl2br($content) ?>
            </p>
                <div class="link">
                            <div class="row">
                                <div class="col-8">
                                </div>
                                <div class="col-4">
                                    <a href="index.php?action=post&amp;id=<?= ($post->getId()) ?>">Commentaires</a>
                                    <a href="index.php?action=post&amp;id=<?= ($post->getId()) ?>"> lire la suite...</a>
                                </div>
                            </div>
               </div>
        </div>
    </div>


<?php
}
?>

 <?php for ( $i=1 ; $i <=($nbpages[0]/3+1); $i++)
     echo"<a href=\"/index.php?page=$i\">page $i</a> ";
  ?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


