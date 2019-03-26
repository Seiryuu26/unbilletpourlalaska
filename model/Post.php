<?php
namespace www\p3\model;
/**
 * Classe which represents all the entities of a  post
 * @author David P.
 * @version 0.1.0
 */
class Post

{
    /**
     * all the features about a post
     * @var $id
     */
    private $id;
    private $title;
    private $content;
    private $creationDate;
    private $author;
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
    public function setCreationDate($date)

    {
        $this->creationDate = $date;
    }
    public function setAuthor($author)

    {
        $this->author = $author;
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
    public function getCreationDate()

    {
        return $this->creationDate ;
    }
    public function getAuthor()

    {
        return $this->author;
    }
 }
