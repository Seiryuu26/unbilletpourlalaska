<?php
namespace www\p3\model;
require_once("model/Manager.php");
require_once("model/Author.php");

class AdminManager extends Manager
 {
 
   public function connected ($pseudo)
   {
     $db= $this->dbConnect();
     $req = $db->prepare('SELECT id,firstname,lastname,pseudo,password FROM author WHERE pseudo=:pseudo ');
     $req->execute(array('pseudo' => $pseudo ));
     $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Author::class);
     $resultat = $req->fetch();
       return $resultat;
   }
 
 }
?>
