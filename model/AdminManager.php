<?php
namespace www\p3\model;
require_once("model/Manager.php");

class AdminManager extends Manager
 {
 
   public function connected ($pseudo,$motdepasse)
   {
     $db= $this->dbConnect();
     $req = $db->prepare('SELECT id,nom,prenom,pseudo,motdepasse FROM users WHERE pseudo=:pseudo AND motdepasse=:motdepasse');
     $req->execute(array('pseudo' => $pseudo,'motdepasse' => $motdepasse));
     $resultat = $req->fetch();
       return $resultat;
   }
 
 }