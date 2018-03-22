<?php

namespace www\p3\model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM article ORDER BY date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($articleId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM article WHERE id = ?');
        $req->execute(array($articleId));
        $post = $req->fetch();

        return $post;
    }
    public function updatePost($articleId,$contenu,$titre,$chapitre)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE articles SET contenu = ?,titre = ?,chapitre = ?  WHERE id = ?');
        $reaffectedLines =$req->execute(array($articleId,$contenu,$titre,$chapitre));
       return $reaffectedLines;

    }
    public function deletePost($articleId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM articles  WHERE id = ?'); 
        $deleteLines= $req->execute(array($articleId));
        return $deleteLines;
    }
    public function newPost($chapitre,$titre,$contenu)
    {
      $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO articles(chapitre, titre, contenu, creationDate) VALUES(?, ?, ?, NOW())');
        $newLines = $posts->execute(array($chapitre,$titre,$contenu));
        return $newLines;
    }


 
   

}