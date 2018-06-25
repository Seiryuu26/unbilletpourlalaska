<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<div class="container admin add">
    <div class="row ">
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
        
        <script>
tinymce.init({
    selector:   "textarea",
    width:      '100%',
    height:     270,
});

// Prevent bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
		e.stopImmediatePropagation();
	}
});

$('#open').click(function() {
	$("#dialog").dialog({
		width: 800,
		modal: true
	});
});
</script>


        <table>
        <h1><strong>Modifier les commentaires </strong></h1>
        <table BORDER="2">
        <tr>
        <th>num&eacute;ros commentaires signal&eacute;s</th>
        <th>liste commentaires signal&eacute;s</th>
        <th>effacer</th>
        </tr>
        <?php

        while ($comment = $comments->fetch()){
            
             echo '
        <tr>
        <th>'.$comment['id'].'</th>
        <th>'.htmlspecialchars($comment['contenu']).'</th>
        
        <td><a class="btn btn-primary" href="index.php?action=eraseComment&id='.$comment['id'].'">effacer</a></td>
        </tr>
        ';
         }
        ?>
        </table>
        
        <table>
        <h1><strong>Modifier les articles </strong></h1>
        <table BORDER="2">
        <tr>
        <th>num&eacute;ros articles </th>
        <th>liste  des articles </th>
        <th>modifier</th>  
        <th>effacer</th>
        </tr>
        <?php

        while ($post = $posts->fetch()){
            
             echo  '
        <tr>
        <th>'.$post['id'].'</th>
        <th>'.htmlspecialchars($post['contenu']).'</th>
        
        <td><a class="btn btn-primary" href="index.php?action=modifyPost&id='.$post['id'].'">modifier</a></td>
        <td><a class="btn btn-primary" href="index.php?action=erasePost&id='.$post['id'].'">effacer</a></td>
        </tr>
        ';
         }
        ?>
        </table>
         
            
                <?php $error1; ?>
            
       
    </div>

</div>
<?php $content = ob_get_clean(); ?>
        
<?php require('template.php'); ?>