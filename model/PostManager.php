<?php

namespace www\p3\model;
require_once("model/Post.php");
require_once("model/Manager.php");
require_once("model/Author.php");

class PostManager extends Manager
{
    /**
     * @return array
     */
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT post.id, title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate ,member.firstname,member.lastname FROM post,member WHERE member.id= post.member_id  ORDER BY post_date DESC LIMIT 0, 5');
        $req->execute(array());
       // $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Post::class);
       // $posts = $req->fetchAll();
        $posts = array();//tableau dobjets post
        $req->execute(array());

        while($post = $req->fetch())
        {
            //var_dump($post);
            $author= new Author();
            $author->setFirstname($post['firstname']);
            $author->setLastname($post['lastname']);
            $article= new Post();
            $article->setId($post['id']);
            $article->setTitle($post['title']);
            $article->setContent($post['content']);
            $article->setCreationDate($post['creationDate']);
            $article->setAuthor($author);

            array_push($posts,$article);
                // ajout  setter article posts tableau cree l17



        }
        return $posts;
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