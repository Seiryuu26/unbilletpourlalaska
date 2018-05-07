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
        $commentaires = $db->prepare('INSERT INTO commentaire(article_id, auteur, contenu, date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $commentaires->execute(array($postId, $auteur, $contenu));

        return $affectedLines;
    }
    
    public function updateComment($commentaireid,$commentaire)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaire SET commentaire = ? WHERE id = ?');
        $Lines =$req->execute(array($commentaireId,$commentaire));
       return $Lines;

    }
    
     public function signal($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaire SET signaler = 1 WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $comment;
    }
    public function thisSignal($signal){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT  signaler FROM commentaire');
         $comments =$req->execute(array($signal));
       return $comment;
    }
    public function designal($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaire SET signaler = 0 WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $comment;
    }
    public function commentaireSignal(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, auteur, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaire WHERE signaler=1');
        $req->execute(array());
       return $req;
    }
    
    public function erase($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM commentaire  WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $comment;
    }
    
}
    