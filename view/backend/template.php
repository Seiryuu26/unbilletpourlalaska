<!DOCTYPE html>
<html>
<html lang="fr">
    
    <head>
        <title>Billet simple pour l'Alaska</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <title><?=$title ?></title>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <link href="public/style.css" rel="stylesheet" /> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    </head>

    <body>
        
     <div class='container'>
        
         
    <h1>Billet simple pour l'Alaska</h1>

        <?=$content
?>
    
    </div> 
        <div class="alert alert-secondary" role="alert">
        
        <?php
if (!empty($_SESSION['pseudo']) && !empty($_SESSION['id']))

{
    echo '<p><a href="/?action=logout">Déconnexion</a></p>';

    echo '<p><a href="/?action=board">Accéder à l\'espace d\'administration </a></p>';
}
else
{
    echo '<p><a href="/?action=login">Accéder à l\'espace d\'administration  </a></p>';
}

?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>

<div class="pagination">
    <span class="text-left">Page </span>
    <span> 1 </span>
    <a href="?page=2"> 2 </a>
    <a href="?page=3"> 3 </a>

</div>