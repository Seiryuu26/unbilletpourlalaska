<?php
namespace www\p3\model;
require_once("model/Manager.php");
require_once("model/Member.php");

class AdminManager extends Manager
 {
 
   public function connected ($pseudo)
   {
     $db= $this->dbConnect();
     $req = $db->prepare('SELECT id,firstname,lastname,pseudo,password FROM member WHERE pseudo=:pseudo ');
     $req->execute(array('pseudo' => $pseudo ));
     $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Member::class);
     $resultat = $req->fetch();
       return $resultat;
   }
 
 }
?>
