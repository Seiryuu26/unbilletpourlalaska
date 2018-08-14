<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');



function listPosts()
{
    $postManager = new www\p3\model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listpostView.php');
}

function post()
{
    $postManager = new www\p3\model\PostManager();
    $commentManager = new www\p3\model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($post);

    require('view/frontend/postView.php');
}

function addComment($postId, $member, $comment)
{
    $commentManager = new www\p3\model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $member, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible to add the comment !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


function modifyComment($commentId)
{
    $commentManager = new www\p3\model\CommentManager();

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
    $commentManager = new www\p3\model\CommentManager();

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
    $commentManager = new www\p3\model\CommentManager();

    $affectedLines = $commentManager->signal($commentId);

    if ($affectedLines === false) {
        throw new Exception('comment already signaled !');
    }
    else {
        header('Location: index.php');
    }
}



