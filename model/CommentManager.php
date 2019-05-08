<?php

namespace www\model;
require_once("model/Comment.php");
require_once("model/Manager.php");

/**
 * Class CommentManager who is in charge in dealing with  comments[get,post,update,signal, erase] and interacting with database
 * @package www\p3\model
 */

class CommentManager extends Manager
{
    public function getComments($post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
        $req->execute(array($post->getId()));
        $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Comment::class);
        $commentaires = $req->fetchAll();
        return $commentaires;
    }
    public function postComment($comment)
    {
        $db = $this->dbConnect();
        $commentaires = $db->prepare('INSERT INTO comment(post_id, author, content, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $commentaires->execute(array($comment->getPostId(),$comment->getAuthor(),$comment->getContent()));
        return $affectedLines;
    }
    public function updateComment($commentid,$comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET comment = ? WHERE id = ?');
        $Lines =$req->execute(array($comment->getCommentId(),$comment->getComment()));
       return $Lines;
    }
     public function signal($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET signaled = 1 WHERE id = ?');
         $comment =$req->execute(array($commentId));
       return $comment;
    }
    public function thisSignal($signal){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT  signaled FROM comment');
         $comments =$req->execute(array($comment->getSignalId()));
       return $comment;
    }
    public function designal($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET signaled = 0 WHERE id = ?');
         $comment =$req->execute(array($comment->getCommentId()));
       return $comment;
    }
    public function commentSignal(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE signaled=1 ');
        $req->execute(array());
       return $req;
    }
    public function erase($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
         $comment =$req->execute(array($commentId));
       return $comment;
    }
    
}
    