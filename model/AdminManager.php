<?php
namespace www\p3\model;
require_once("model/Manager.php");

class AdminManager extends Manager
 {
 
   public function connected ($pseudo,$motdepasse)
   {
     $db= $this->dbConnect();
     $req = $db->prepare('SELECT id,nom,prenom,pseudo,motdepasse FROM auteur WHERE pseudo=:pseudo AND motdepasse=:motdepasse');
     $req->execute(array('pseudo' => $pseudo,'motdepasse' => $motdepasse));
     $resultat = mysql_query($req->fetch());
       return $resultat;
   }
 
 }