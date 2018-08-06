<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');
require_once('tools/Tools.php');
//use \wwww\p3\model\AdminManager;

function login()
{
    require('view/frontend/connectView.php');
}

function connexion($pseudo,$password)
{
        //instantiation of the tools class;
        $tools = new www\p3\tools\Tools();
        $recaptchaCheck = $tools->recaptchaCheck($_POST['g-recaptcha-response'],$_SERVER['REMOTE_ADDR']);
        //$postManager = new www\p3\model\PostManager(); // Création d'un objet
        $adminManager = new www\p3\model\AdminManager();
        //$adminManager = new AdminManager();
        $resultat = $adminManager->connected($pseudo);
    


        if (!$resultat)
        {
             echo  'Wrong ID or password ! !';
        }
        else
        {
            if(password_verify($password,$resultat->getPassword()))
            {
           
                $_SESSION['id'] = $resultat->getId();
                $_SESSION['pseudo'] = $resultat->getPseudo();
                header('Location: index.php?action=board');
                echo 'You are connected !'; 

          




            }else echo 'Wrong login or password!';
        }  
    
    
    
    
}

 function board()
{
     
   

     $commentManager = new www\p3\model\CommentManager();
     $comments = $commentManager->commentSignal();
     
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
        throw new Exception('comment already erased  !');
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
        throw new Exception('comment already moderated  !');
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
* @param $title
* @param $content
*/
function addPost($title, $content)
{
    $PostManager = new www\p3\model\PostManager();

    $affectedLines = $PostManager->addPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible to add the chapter !');
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
        throw new Exception('post already erased !');
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
function doModifyPost($id,$title,$content)
{
    $PostManager = new www\p3\model\PostManager();

    $affectedLines = $PostManager->modifyPost($post);

    if ($affectedLines === false) {
        throw new Exception('Impossible to update the chapter !');
    }
    else {
        header('Location: index.php?action=board' );
    }
}
