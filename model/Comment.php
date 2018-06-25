<?php
namespacewwwp3model;
/**
 * Classe which represents an comment
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
    private $post_id;
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
    public function setPost_id($post_id)

    {
        $this->post_id = $post_id;
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
    public function getPost_id()

    {
        return $this->post_id ;
    }
    public function getSignaled()

    {
        return $this->signaled ;
    }