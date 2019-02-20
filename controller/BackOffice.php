<?php
namespace www\p3\controller;

// Chargement des classes
require_once('model/Post.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');
require_once('tools/Tools.php');
use \www\p3\model\Post;
use \www\p3\model\PostManager;
use \www\p3\model\CommentManager;
use \www\p3\model\AdminManager;
use \www\p3\tools\Tools;

class BackOffice
{

function login()
{
    require('view/frontend/connectView.php');
}

function connexion($pseudo,$password)
{
        //instantiation of the tools class;
        $tools = new Tools();
        $recaptchaCheck = $tools->recaptchaCheck($_POST['g-recaptcha-response'],$_SERVER['REMOTE_ADDR']);
        //$postManager = new www\p3\model\PostManager(); // Création d'un objet
        $adminManager = new AdminManager();
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
     
   

     $commentManager = new CommentManager();
     $comments = $commentManager->commentSignal();
     
     $postManager = new PostManager();
     var_dump($post)
    if(isset($_GET['page']))
        $page =$_GET['page'];
    else $page = 0;
     $posts = $postManager->getPosts($page);


    // calling  the view
    require('view/backend/addPostView.php');
}
function eraseComment($commentId)
{
    $commentManager = new CommentManager();

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
    $commentManager = new CommentManager();

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
function addPost($title,$content)
{
    $PostManager = new PostManager();
    $post = new Post();
    $post->setTitle($title);
    $post->setContent($content);
    $affectedLines = $PostManager->addPost($post);

    if ($affectedLines === false) {
        throw new \Exception('Impossible to add the chapter !');
    }
    else {
        $_SESSION['message']= 'Vous avez correctement publie cet article';

        header('Location: index.php?action=board' );
    }
}
function erasePost($postId)
{
    $postManager = new PostManager();

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
    $postManager = new PostManager();

    $post = $postManager->getPost($postId);
    
    require('view/backend/updatePostView.php');
    
}
function doModifyPost($datapost)
{
    $PostManager = new PostManager();
    $post = new Post();
    $post->setId($datapost['id']);
    $post->setTitle($datapost['title']);
    $post->setContent($datapost['content']);
    $affectedLines = $PostManager->modifyPost($post);

    if ($affectedLines === false) {
        throw new Exception('Impossible to update the chapter !');
    }
    else {
        header('Location: index.php?action=board' );
    }
}
}
