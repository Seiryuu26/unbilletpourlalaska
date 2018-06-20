<?php
namespace www\p3\model;
require_once("model/Manager.php");
require_once("model/Author.php");

class AdminManager extends Manager
 {
 
   public function connected ($pseudo,$motdepasse)
   {
     $db= $this->dbConnect();
     $req = $db->prepare('SELECT id,nom,prenom,pseudo,motdepasse FROM auteur WHERE pseudo=:pseudo AND motdepasse=:motdepasse');
     $req->execute(array('pseudo' => $pseudo,'motdepasse' => $motdepasse));
     $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, "Author");
     $resultat = $req->fetch();
       return $resultat;
   }
 
 }