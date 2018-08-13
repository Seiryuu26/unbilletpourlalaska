<?php

namespace www\p3\model;
require_once("model/Comment.php");
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $commentaires = $db->prepare('SELECT id, member, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY date DESC');
        $commentaires->execute(array($comment->getPostId));

        return $commentaires;
    }

    public function postComment($postId, $member, $content )

    {
        $db = $this->dbConnect();
        $commentaires = $db->prepare('INSERT INTO comment(post_id, member, content, post_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $commentaires->execute(array($comment->getPostId(),$comment->getMember(),$comment->getContent()));

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
         $comment =$req->execute(array($comment->getCommentId()));
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
        $req = $db->prepare('SELECT id, author, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE signaled=1 ');
        $req->execute(array());
       return $req;
    }
    
    public function erase($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
         $comment =$req->execute(array($comment->getCommentId()));
       return $comment;
    }
    
}
    