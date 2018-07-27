<?php

namespace www\p3\model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($articleId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_uk FROM post WHERE id = ?');
        $req->execute(array($articleId));
        $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, "Post");
        $post = $req->fetch();

        return $post;
    }
    public function modifyPost($articleId,$titre,$contenu)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET content = ?,title = ?  WHERE id = ?');
        $reaffectedLines =$req->execute(array($contenu,$titre,$articleId));
       return $reaffectedLines;

    }
    public function deletePost($articleId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post  WHERE id = ?'); 
        $deleteLines= $req->execute(array($articleId));
        return $deleteLines;
    }
    public function addPost($titre,$contenu)
    {
      $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO post(title, content,date) VALUES(?, ?, NOW())');
        $newLines = $posts->execute(array($titre,$contenu));
        return $newLines;
    }
    


 
   

}