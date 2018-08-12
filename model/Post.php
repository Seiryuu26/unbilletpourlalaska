<?php
namespacewwwp3model;
/**
 * Classe which represents a post
 * @author David P.
 * @version 0.1.0
 */
class Post

{
    /**
     * @var $id
     */
    private $id;
    private $title;
    private $content;
    private $date;
    // SETTERS
    public function setId($id)

    {
        $this->id = (int)$id;
    }
    public function setTitle($title)

    {
        $this->title = $title;
    }
    public function setContent($content)

    {
        $this->content = $content;
    }
    public function setDate($date)

    {
        $this->date = $date;
    }
    
    //GETTERS
    public function getId()

    {
        return $this->id ;
    }
    public function getTitle()

    {
        return $this->title ;
    }
    public function getContent()

    {
         return $this->content ;
    }
    public function getDate()

    {
        return $this->date ;
    }
 }
