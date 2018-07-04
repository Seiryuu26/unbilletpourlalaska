<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<div class="container admin add">
    <h1><strong>Ajouter un chapitre </strong></h1>
        <br>
        <form action='index.php?action=addPost' method="post">
            <div class="form-group">
                <label for="name">Chapitre:</label>
                <input type="text" class="form-control" name='chapitre' placeholder="Chapitre"> <span class="help-inline"></span> </div>
            <div class="form-group">
                <label for="description">Titre:</label>
                <input type="text" class="form-control" name='titre' placeholder="Titre"> <span class="help-inline"></span> </div>
            <div class="form-group">
                <label for="description">Contenu:</label>
                <textarea type="text" class="form-control" name='contenu' placeholder="Contenu"></textarea> <span class="help-inline"></span> </div>
            <br>
            <br>
            <div class="form-actions">
                <input href="" type="submit" class="btn btn-success " value=" Ajouter"><a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left" > Retour</span></a> </div>
            
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
<div class="row">
<table class="table table-bordered">
    <th><div class="col">num&eacute;ros commentaires signal&eacute;s</div></th>
    <th><div class="col">liste commentaires signal&eacute;s</div></th>
    <th><div class="col">effacer</div></th>
</table>
</div>
        <?php

        while ($comment = $comments->fetch()){
            
             echo '
        <div class="row">
        <div class="col">'.$comment['id'].'</div>
        <div class="col">'.htmlspecialchars($comment['contenu']).'</div>
        
        <div class="col"><a class="btn btn-primary" href="index.php?action=eraseComment&id='.$comment['id'].'">effacer</a></div>
        </div>
        ';
         }
        ?>
</div>
        
<div class="container border-article">
<h1>Modifier les articles</h1>
<div class="row">
<table class="table table-bordered">
        <th><div class="col">num&eacute;ros articles </div></th>
        <th><div class="col">liste  des articles </div></th>
        <th><div class="col">modifier</div></th>  
        <th><div class="col">effacer</div></th>
</table>
        </div>
        <?php

        while ($post = $posts->fetch()){
            
             echo  '
        <div class="row">
        <div class="col">'.$post['id'].'</div>
        <div class="col">'.htmlspecialchars($post['contenu']).'</div>
        
        <div class="col"><a class="btn btn-primary" href="index.php?action=modifyPost&id='.$post['id'].'">modifier</a></div>
        <div class="col"><a class="btn btn-primary" href="index.php?action=erasePost&id='.$post['id'].'">effacer</a></div>
      </div>
        ';
         }
        ?>
         
            
                <?php $error1; ?>
            
       
    </div>

<?php $content = ob_get_clean(); ?>
        
<?php require('template.php'); ?>