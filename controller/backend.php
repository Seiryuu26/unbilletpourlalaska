<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');
//use \wwww\p3\model\AdminManager;

function login()
{
    require('view/frontend/connectView.php');
}

function connexion($pseudo,$motdepasse)
{
        //$postManager = new www\p3\model\PostManager(); // Création d'un objet
        $adminManager = new www\p3\model\AdminManager();
        //$adminManager = new AdminManager();
        $resultat = $adminManager->connected($pseudo,$motdepasse);
    


        if (!$resultat)
        {
             echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            
             session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $resultat['pseudo'];
            header('Location: index.php?action=board');
            echo 'Vous êtes connecté !'; 

          




        }
    -------------------------------------------
    {
    
    session_start();
   $_SESSION['Titre']=$titre;
   $_SESSION['Chapitre']=$chapitre;
   $_SESSION['Contenu']=$contenu;
    }
   require frontend/addPostView.php
   require frontend/changePostView.php
   require frontend/deletePostView.php
    
    
    
}
function deleteSession()
{
        session_start();
function board()
{
 $comments= array("'commentaire1' =>'ah oui..'","'commentaire2'=>'Ce voyage a l'air dangereux...'","'commentaire3' =>'a quand la suite..'","'commentaire4' =>'interessant..'");
 function board()
{
 $comments= array("'commentaire1' =>'interessant..'","'commentaire2'=>'j'ai envie de lire la suite...'","'commentaire3' =>'a quand la suite?..'","'commentaire4' =>'a quand le prochain chapitre?..'","'commentaire5' =>'ce voyage a l'air dangereux..'","'commentaire6' =>'ah oui...'"$COMMENTS[0]='interessant';$COMMENTS[1]='interessant';$COMMENTS[2]='j\'ai envie de lire la suite...';$COMMENTS[3]='a quand la suite?..';$COMMENTS[4]='a quand le prochain chapitre?..';$COMMENTS[5]='ce voyage a l\'air dangereux..';"$COMMENTS[6]='ah oui...';");
    
   
foreach($comments as $element)
{ 
    echo $element.'<br/>';
}
    // calling  the view
    require('view/backend/addPostView.php');
}

function logout() {
   
// Suppression des variables de session et de la session
//$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
      header('Location: index.php');
    }

// Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

// Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('motdepasse', '');
        header('Location: index.php');
}


