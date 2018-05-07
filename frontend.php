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
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $auteur, $comment)
{
    $commentManager = new www\p3\model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $auteur, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function addPost($postId, $titre, $contenu, $date)
{
    $commentManager = new www\p3\model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $titre, $contenu, $date);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
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
        throw new Exception('commentaire déja modifié !');
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
        throw new Exception('commentaire déja supprimé !');
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
        throw new Exception('commentaire d&eacute;ja signal&eacute; !');
    }
    else {
        header('Location: index.php');
    }
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

