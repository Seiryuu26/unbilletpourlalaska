<?php
namespace www\p3;
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/frontend/view.php');

class BackendController{
  

    public function changeComment($commentId) 
{ 
    $commentManager = new \www\p3\model\CommentManager();
    $comment = $commentManager->getComment($_GET['id']);
    $view = new View('changePostView'); 
    $view->generer(array('comment' => $comment));
}
    
public function newComment($commentId,$comment)
{
    $commentManager = new \www\p3\model\CommentManager();

    $reaffectedLines = $commentManager->updateComment($commentId,$comment);

   
        header('Location: index.php?action=editCommentaire&id=' . $commentaire . '&particleId='. $articleId);
    
}
    
   public function changePost($postId) 
{ 
    $postManager = new \www\p3\model\PostManager();
    $article = $postManager->getPost($_GET['id']);
    $view = new View('updatePostView'); 
    $view->generer(array('post' => $post));
}
    
   public function modifPost($postId,$content,$title,$chapter)
{
    $articleManager = new \www\p3\model\PostManager();

    $reaffectedLines = $articleManager->updatearticle($postId,$content,$title,$chapter);

   
        header('Location: index.php?action=board');
    
}
   public function cleanArticle($articleId){
     $postManager = new \www\p3\model\PostManager();
    $post = $postManager->getArticle($_GET['id']);
    $view = new View('deleteArticleView'); 
    $view->generer(array('article' => $article));
        }
 public function erasearticle($articleId){
     $postManager = new \www\p3\model\PostManager();
    $deleteLines = $postManager->deleteArticle($_GET['id']);
 header('Location: index.php?action=board');
}
    public function eraseCommentaire($commentaireId){
     $commentManager = new \www\p3\model\CommentManager();
    $deleteCommentaire = $commentManager->deleteComment($_GET['id']);
 header('Location: index.php?action=board');
}
    
    
     public function connect(){
   $postManager = new \www\p3\model\PostManager();
    $post = $postManager;
    $view = new View('connectView'); 
    $view->generer(array('article' => $article));
        }
 public function commentsView()
{
    $postManager = new \www\p3\model\PostManager();
    $commentManager = new \www\p3\model\CommentManager();

    $article = $postManager->getArticle($_GET['id']);
    $commentaires = $commentManager->getCommentaires($_GET['id']);
    $view = new View('commentairesView');
    
   $view->generer(array('article' => $article,'commentaires' => $commentaires));
      
}
   
    public function reability($commentaireId)
{
    $commentManager = new \www\p3\model\CommentManager();
    $commentaire = $commentManager->demoderate($_GET['id']);
        header('Location: index.php?action=board'); 
    }
    
    public function commentaireAction()
{
    $commentManager = new \www\p3\model\CommentManager();
    $commentaires = $commentaireManager->commentaireModerate();
    $view = new View('commentModerateView');
    $view->generer(array('commentaires' => $commentaires));
     
}

 public function addArticle(){
    $postManager = new \www\p3\model\PostManager();
    $post = $postManager;
    $view = new View('addPostView'); 
    $view->generer(array('article' => $article));
        }   
 public function otherArticle($chapitre,$titre,$contenu){
     $postManager = new \www\p3\model\PostManager();
    $newLines = $postManager->newArticle($chapitre,$titre,$contenu);
     $view = new View('addPostView'); 
     header('Location: index.php?action=board');
    
}   
    
    
    
}