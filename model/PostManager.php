<?php

namespace www\p3\model;
require_once("model/Post.php");
require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY post_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($articleId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM post WHERE id = ?');
        $req->execute(array($articleId));
        $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Post::class);
        $post = $req->fetch();

        return $post;
    }
    /**
    * method modify post 
    * @param Post $post
    * @return reaffected line 
    */
    public function modifyPost($post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET content = ?,title = ?  WHERE id = ?');
        $reaffectedLines =$req->execute(array($post->getContent(),$post->getTitle(),$post->getId()));
       return $reaffectedLines;

    }
    public function deletePost($articleId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post  WHERE id = ?'); 
        $deleteLines= $req->execute(array($post->getId()));
        return $deleteLines;
    }
    public function addPost($post)
    { try{
      $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO post(title, content,post_date) VALUES(?,? , NOW())');
        $newLines = $posts->execute(array($post->getTitle(),$post->getContent()));
        return $newLines;
    }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
   }


 

}