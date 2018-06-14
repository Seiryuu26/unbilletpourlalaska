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
             echo  htmlspecialchars'Mauvais identifiant ou mot de passe !';
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
     
     $postManager = new www\p3\model\PostManager();
     $posts = $postManager->getPosts();
     

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
/**
* method in call from the rounting page under action addPost 
* @param $titre
* @param $contenu
*/
function addPost($titre, $contenu)
{
    $PostManager = new www\p3\model\PostManager();

    $affectedLines = $PostManager->addPost($titre, $contenu);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le chapitre !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function erasePost($postId)
{
    $postManager = new www\p3\model\PostManager();

    $affectedLines = $postManager->deletePost($postId);

    if ($affectedLines === false) {
        throw new Exception('article d&eacute;ja effac&eacute; !');
    }
    else {
        header('Location: index.php');
    }
}
function modifyPost($postId)
{
    $postManager = new www\p3\model\PostManager();

    $post = $postManager->getPost($postId);
    
    require('view/backend/updatePostView.php');
    
}
function domodifyPost($id,$titre,$contenu)
{
    $PostManager = new www\p3\model\PostManager();

    $affectedLines = $PostManager->modifyPost($id,$titre,$contenu);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajourner le chapitre !');
    }
    else {
        header('Location: index.php?action=board' );
    }
}
