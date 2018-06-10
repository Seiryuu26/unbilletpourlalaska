<!DOCTYPE html>
<html>
<html lang="fr">
    
    <head>
        <title>Billet simple pour l'Alaska</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title><?=$title ?></title>
        <link href="style.css" rel="stylesheet" /> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    </head>
        
    <body>
        
        
<div class="card__group">
<div id="contenu" class="row">
<div class="card__container card__container--3">
  
    

    </div>
    
         

    <h1>Billet simple pour l'Alaska</h1>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="bootstrap/js/bootstrap.min.js"></script>
        <?=$content
?>
        <?php
if (!empty($_SESSION['pseudo']) && !empty($_SESSION['id']))

{
    echo '<p><a href="/p3/?action=logout">Déconnexion</a></p>';

    echo '<p><a href="/p3/?action=board">Accéder à l\'espace d\'administration</a></p>';
}
else
{
    echo '<p><a href="/p3/?action=login">Accéder à l\'espace d\'administration</a></p>';
}

?>
    </body>
</html>