
    <div class="container admin add">
        <div class="row ">
            <h1><strong>Modifier ce chapitre </strong></h1>
            <br>
            <form class="form" role="form" action="index.php?action=modifyPost" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="description">Titre:</label>
                    <input type="text" class="form-control" id="title" name="titre" placeholder="Titre" value="<?= htmlspecialchars($post['titre']) ?>"> <span class="help-inline"></span> </div>
                
                <div class="form-group">
                    <label for="description">Contenu:</label>
                    <textarea type="textarea" class="form-control" id="content" name="contenu" >
                        <?= nl2br(htmlspecialchars($post['contenu']))?>
                    </textarea> <span class="help-inline"></span> </div>
                <br>
                <div class="form-actions">
                <input type="hidden" name= "id" value="<?= htmlspecialchars($post['id']) ?>">
                <input type="submit" class="btn btn-success " value=" Modifier"><a class="btn btn-primary" href="index.php?modifyPost"><span class="glyphicon glyphicon-arrow-left" > Retour</span></a> </div>
            </form>
        </div>
    </div>