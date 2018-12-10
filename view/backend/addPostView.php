<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<div class="container admin add">
            <?php
            if (isset($_SESSION['message']) AND $_SESSION['message']!== NULL ){
                echo '<div class="alert alert-primary" role="alert">';
                echo $_SESSION['message'] ;
                echo '</div>';
            }


            ?>

    <h1><strong>Ajouter un chapitre </strong></h1>
        <br>
        <form action='index.php?action=addPost' method="post">
            <div class="form-group">
                <label for="name">Chapitre:</label>
                <input type="text" class="form-control" name='chapter' placeholder="Chapter"> <span class="help-inline"></span> </div>
            <div class="form-group">
                <label for="description">Titre:</label>
                <input type="text" class="form-control" name='title' placeholder="Title"> <span class="help-inline"></span> </div>
            <div class="form-group">
                <label for="description">Contenu:</label>
                <textarea type="text" class="form-control" name='content' placeholder="Content"></textarea> <span class="help-inline"></span> </div>
            <br>
            <br>
            <div class="form-actions">
                <input type="submit" class="btn btn-success " value=" Ajouter"><a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left" > Retour</span></a> </div>
            
        </form>
</div>
        
        <script>
tinymce.init({
    selector:   "textarea",
    width:      '100%',
    height:     70,
});

// Prevent bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
		e.stopImmediatePropagation();
	}
});

$('#open').click(function() {
	$("#dialog").dialog({
		width: 100,
		modal: true
	});
});
</script>

<div class="container border">
<h1>Modifier les commentaires </h1>
<div class="row myborder">
    <div class="col-lg-2">num&eacute;ros commentaires signal&eacute;s</div>
    <div class="col-lg-8">liste commentaires signal&eacute;s</div>
    <div class="col-lg-2">effacer</div>
</div>
        <?php
        while ($comment = $comments->fetch()){
            
         echo '   
         <div class="row myborder">
         <div class="col-lg-2">'.$comment['id'].'</div>
         <div class="col-lg-8">'.htmlspecialchars($comment['content']).'</div>
        
         <div class="col-lg-2"><a class="btn btn-primary" href="index.php?action=eraseComment&id='.$comment['id'].'">effacer</a></div>
        </div>
        ';
         }
        ?>
</div>
        
<div class="container border-article">
<h1>Modifier les articles</h1>
<div class="row myborder">

        <div class="col-2">num&eacute;ros articles </div>
        <div class="col-lg-6">liste  des articles </div>
        <div class="col-lg-2">modifier</div>  
        <div class="col-lg-2">effacer</div>
        </div>
        <?php

        foreach ($posts as $post){
            
             echo  '
        <div class="row myborder">
       
       <div class="col-2">'.$post->getId().'</div>
       <div class="col-6">'.htmlspecialchars($post->getContent()).'</div>
        
         <div class="col-2"><a class="btn btn-primary" href="index.php?action=modifyPost&id='                  .$post->getId().'">modifier</a></div>
        <div class="col-2"><a class="btn btn-primary" href="index.php?action=erasePost&id='              .$post->getId().'">effacer</a></div>
      </div>
        ';
         }
        ?>
         
            
                <?php $error1; ?>
            
       
    </div>

<?php $content = ob_get_clean(); ?>
        
<?php require('template.php'); ?>