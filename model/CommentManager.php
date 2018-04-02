<?php

namespace www\p3\model;
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $commentaires = $db->prepare('SELECT id, auteur, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaire WHERE article_id = ? ORDER BY date DESC');
        $commentaires->execute(array($postId));

        return $commentaires;
    }

    public function postComment($postId, $auteur, $contenu )

    {
        $db = $this->dbConnect();
        $commentaires = $db->prepare('INSERT INTO commentaire(article_id, auteur, contenu, date) VALUES(?, ?, ?,?, NOW())');
        $affectedLines = $commentaires->execute(array($postId, $auteur, $contenu));

        return $affectedLines;
    }
    
    public function updateComment($commentaireid,$commentaire)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET commentaire = ? WHERE id = ?');
        $Lines =$req->execute(array($commentaireId,$commentaire));
       return $Lines;

    }
    
     public function boolean($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET moderate = 1 WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $commentaire;
    }
    
    public function thisModerate($moderate){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT  moderate FROM commentaires');
         $comments =$req->execute(array($moderate));
       return $commentaires;
    }
    
     public function demoderate($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET moderate = 0 WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $commentaires;
    }
    
    public function commentaireModerate(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, auteur, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE moderate=1');
         
       return $req;
    }
    
    public function deleteCommentaire($commentaireId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM commentaires  WHERE id = ?'); 
        $deleteComment=$req->execute(array($commentaireId));
        return $deleteCommentaire;
    }
}
    
