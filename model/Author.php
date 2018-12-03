<?php
namespace www\p3\model;
/**
 * Classe which represents an author
 * @author David P.
 * @version 0.1.0
 */
class Author

{
    /**
     * @var $id
     */
    private $id;
    private $firstname;
    private $lastname;
    private $pseudo;
    private $password;
    // SETTERS
    public function setId($id)

    {
        $this->id = (int)$id;
    }
    public function setFirstname($firstname)

    {
        $this->firstname = $firstname;
    }
    public function setLastname($lastname)

    {
        $this->lastname = $lastname;
    }
    public function setPseudo($pseudo)

    {
        $this->pseudo = $pseudo;
    }
    public function setPassword($password)

    {
        $this->password = $password;
    }
    
    //GETTERS
    public function getId()

    {
        return $this->id ;
    }
    public function getFirstname()

    {
        return $this->firstname ;
    }
    public function getLastname()

    {
         return $this->lastname ;
    }
    public function getPseudo()

    {
        return $this->pseudo ;
    }
    public function getPassword()

    {
        return $this->password ;
    }
    public function getFullname()

     {
         return $this->firstname. " " .$this->lastname;
     }
}
?>
