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
    
    public function modifyCommentaire($commentaireId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('MODIFY FROM commentaire  WHERE id = ?'); 
        $modifyComment=$req->execute(array($commentaireId));
        return $modifyCommentaire;
    }
    
    public function deleteCommentaire($commentaireId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM commentaire  WHERE id = ?'); 
        $deleteComment=$req->execute(array($commentaireId));
        return $deleteCommentaire;
    }
    
    public function eraseCommentaire($commentaireId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('ERASE FROM commentaire  WHERE id = ?'); 
        $eraseComment=$req->execute(array($commentaireId));
        return $eraseCommentaire;
    }
    public function moderateCommentaire($commentaireId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('ERASE FROM commentaire  WHERE id = ?'); 
        $moderateComment=$req->execute(array($commentaireId));
        return $moderateCommentaire;
    }
    public function erase($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaire SET effacer = 1 WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $comment;
    }
    public function thisErase($erase){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT  effacer FROM commentaire');
         $comments =$req->execute(array($erase));
       return $comment;
    }
    public function derase($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaire SET erase = 0 WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $comment;
    }
    public function commentaireErase(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, auteur, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaire WHERE effacerr=1');
        $req->execute(array());
       return $req;
    }
    public function moderate($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaire SET modérer = 1 WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $comment;
    }
    public function thisModerate($moderate){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT  modérer FROM commentaire');
         $comments =$req->execute(array($erase));
       return $comment;
    }
    public function demoderate($commentaireId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaire SET moderate = 0 WHERE id = ?');
         $comment =$req->execute(array($commentaireId));
       return $comment;
    }
    public function commentaireModerate(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, auteur, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaire WHERE modérer=1');
        $req->execute(array());
       return $req;
    }
}
    