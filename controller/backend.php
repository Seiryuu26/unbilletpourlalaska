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
            
           
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $resultat['pseudo'];
            header('Location: index.php?action=board');
            echo 'Vous êtes connecté !'; 

          




        }
    
    
    
    
}

 function board()
{
     
   

     $commentManager = new www\p3\model\CommentManager();
     $comments = $commentManager->commentaireSignal();
     

    // calling  the view
    require('view/backend/addPostView.php');
}
function eraseComment($commentId)
{
    $commentManager = new www\p3\model\CommentManager();

    $affectedLines = $commentManager->erase($commentId);

    if ($affectedLines === false) {
        throw new Exception('commentaire d&eacute;ja effac&eacute; !');
    }
    else {
        header('Location: index.php');
    }
}
function moderateComment($commentId)
{
    $commentManager = new www\p3\model\CommentManager();

    $affectedLines = $commentManager->moderate($commentId);

    if ($affectedLines === false) {
        throw new Exception('commentaire d&eacute;ja mod&eacute;r&eacute; !');
    }
    else {
        header('Location: index.php');
    }
}
function logout() {
   
// Suppression des variables de session et de la session
//$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
      header('Location: index.php');
    }
function addPost($postChapitre, $titre, $contenu)
{
    $commentManager = new www\p3\model\CommentManager();

    $affectedLines = $commentManager->postComment($postcHPAITRE, $titre, $contenu );

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


