<?php
namespace www\p3\controller;
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/Comment.php');
use \www\p3\model\PostManager;
use \www\p3\model\CommentManager;
use \www\p3\model\Comment;

class FrontOffice
{
    
    function listPosts()
    {
        $postManager = new PostManager(); // Création d'une instance 
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

        require('view/frontend/listpostView.php');
    }
    

    function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($post);

        require('view/frontend/postView.php');
    }

    function addComment($dataComment)
    {
        $commentManager = new CommentManager();
        $comment = new Comment();
        $comment ->setPostId($dataComment['postId']);
        $comment ->setAuthor($dataComment['author']);
        $comment ->setContent($dataComment['content']);
        $affectedLines = $commentManager->postComment($comment);
        

        if ($affectedLines === false) {
            throw new Exception('Impossible to add the comment !');
        }
        else {
            header('Location: index.php?action=post&id=' . $dataComment['postId']);
        }
    }


    function modifyComment($commentId)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->modify($commentId);

        if ($affectedLines === false) {
            throw new Exception('comment already modify !');
        }
        else {
            header('Location: index.php');
        }
    }

    function deleteComment($commentId)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->delete($commentId);

        if ($affectedLines === false) {
            throw new Exception('comment already erased !');
        }
        else {
            header('Location: index.php');
        }
    }

    function signalComment($commentId)
    {

        $commentManager = new CommentManager();

        $affectedLines = $commentManager->signal($commentId);
        if ($affectedLines === false) {
            throw new Exception('comment already signaled !');
        }
        else {
            header('Location: index.php');
        }
    }
}


