<?php $title = 'Mon blog'; ?>
<?php $tools = new Tools();?>
<?php ob_start(); ?>

<h1>Par Jean Forteroche</h1>
<p>Derniers billets du blog :</p>
<?php foreach($posts as $post ) :?>
    <div class="news">
        <h3>
            <a href="index.php?action=post&amp;id=<?= ($post->getId())?>">
                <?= htmlspecialchars($post->getTitle()) ?>
            </a>
            <em><?= ($post->getCreationDate())?></em>
            <?=  "par " . ($post->getAuthor()->getFullname())?>
        </h3>
        <div class="content">
            <p>
                <?= $tools->texte_decoupe($content, 100) ?>
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
<?php endforeach;?>

 <?php for ( $i=1 ; $i <=($nbpages[0]/3+1); $i++):?>
     <a href=\"/index.php?page=<?= $i;?>\">page $i</a>
 <?php endfor?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


