<div class="container admin add">
    <div class="row ">
        <h1><strong>Ajouter un chapitre </strong></h1>
        <br>
        <form action='index.php?action=otherPost' method="post">
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
            <div class="form-actions">
                <input type="submit" class="btn btn-success " value=" Ajouter"><a class="btn btn-primary" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a> </div>
            <p>
                <table>
<h1><strong>Modifier les commentaires </strong></h1>
       
<table BORDER="1">
<tr>
<th>num&eacute;ros commentaires signal&eacute;s</th>
        
<th>liste commentaires signal&eacute;s</th>
        
<th>effacer</th>
        
<th>mod&eacute;rer</th>
        </tr>
  
<?php
         foreach($comments as $value) {
            
             echo '
             <tr>
        <th>'.$value.'</th>
    
<td></td>
        <td><a class="btn btn-primary" href="index.php?action=erasePost&amp">effacer</a></td>
       
<td><a class="btn btn-primary" href="index.php?action=moderateComment&amp">mod&eacute;rer</a></td>
        </tr>
        ';
         }
        ?>
        </table>
         
         
                <?php $error1 ?>
            </p>
        </form>
    </div>
</div>
