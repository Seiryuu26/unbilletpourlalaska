<?php
namespace www\model;
/**
 * Classe which represents all the entites of a comment
 * @author David P.
 * @version 0.1.0
 */
class Comment
{
    /**
     * @var $id
     */
    private $id;
    private $content;
    private $author;
    private $date;
    private $postId;
    private $signaled;
    // SETTERS
    public function setId($id)
    {
        $this->id = (int)$id;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }
    public function setSignales($signaled)
    {
        $this->signaled = $signaled;
    }
    //GETTERS
    public function getId()
    {
        return $this->id ;
    }
    public function getContent()
    {
        return $this->content ;
    }
    public function getAuthor()
    {
         return $this->author ;
    }
    public function getDate()
    {
        return $this->date ;
    }
    public function getPostId()
    {
        return $this->postId ;
    }
    public function getSignaled()
    {
        return $this->signaled ;
    }
}
?>