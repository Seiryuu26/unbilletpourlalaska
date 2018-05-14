<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?=$title ?></title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
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