
    <div class="container admin add">
        <div class="row ">
            <h1><strong>Modifier ce chapitre </strong></h1>
            <br>
            <form class="form" role="form" action="index.php?action=modifyPost&amp;id=
<?= $post['id']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="description">Titre:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="<?= htmlspecialchars($post['titre']) ?>"> <span class="help-inline"></span> </div>
                
                <div class="form-group">
                    <label for="description">Contenu:</label>
                    <textarea type="textarea" class="form-control" id="content" name="content" >
                        <?= nl2br(htmlspecialchars($post['contenu']))?>
                    </textarea> <span class="help-inline"></span> </div>
                <br>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button> <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a> </div>
            </form>
        </div>
    </div>