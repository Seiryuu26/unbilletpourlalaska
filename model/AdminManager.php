<?php
namespace www\p3\model;
require_once("model/Manager.php");
require_once("model/Author.php");

/**
 * Class AdminManager who is in charge to manage the administration 
 * @package www\p3\model
 */
class AdminManager extends Manager
 {
 
   public function connected ($pseudo)
   {
     $db= $this->dbConnect();
     $req = $db->prepare('SELECT id,firstname,lastname,pseudo,password FROM member WHERE pseudo=:pseudo ');
     $req->execute(array('pseudo' => $pseudo ));
     $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Author::class);
       
     $resultat = $req->fetch();
      var_dump($resultat);
       return $resultat;
   }
 
 }
?>
