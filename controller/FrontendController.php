<?php
namespace www\p3;
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/frontend/view.php');


class FrontendController{

    
 public function moderate()
{
    $commentManager = new \www\p3\model\CommentManager();
    $comment = $commentManager->boolean($_GET['id']);
 
    } 
    
  
public function addCommentaire($postId, $auteur,$commentaire)
{
    $commentManager = new \www\p3\model\CommentManager();
    $affectedLines = $commentManager->postCommentaire($postId,$auteur,$commentaire);
     
    header('Location: index.php?action=post&id=' . $postId);
    
    }
    

    public function listArticles()
{
    $postManager = new \www\p3\model\CommentManager();
    $posts = $postManager->limitGetPosts();
    $view = new View('listPostsView');
   $view->generer(array('articles' => $articles));
    
}

public function post()
{
    $postManager = new \www\p3\model\PostManager();
    $commentManager = new \www\p3\model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getCommentaires($_GET['id']);
    $view = new View('postView');
    $view->generer(array('article' => $article,'commentaires' => $commentaires));
  
      
}
    public function board()
{
        $postManager = new \www\p3\model\PostManager();
    
    $posts = $postManager->getarticles();
    
    $view = new View('interface');
   $view->generer(array('articles' => $articles));
          
    }

    
    public function template($page)
{
       
    $postManager = new \www\p3\model\PostManager();
    
    $posts = $postManager->getarticles();
    
    }
   
  
    
    

    }
