<?php

namespace www\model;
/**
 * Class Manager who is in charge of all the features about the db connection and the text in general
 * @package www\model
 */
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=unbilletpourlalaska;charset=utf8', 'unbilletcc', 'HMEPEGEytzVh');
        return $db;
    }
    
     public function texte_decoupe( $texte, $longueur_max, $separateur ) {
    if( strlen($texte) >= $longueur_max ) {
        $texte = substr( $texte, 0, $longueur_max );
        $dernier_espace = strrpos( $texte, ' ' );
        $texte = substr( $texte, 0, $dernier_espace);
        echo   $texte . ' ' . $separateur;
    }
        
     
    else echo   $texte; }
    
   /* public function chapterList() {
    $postManager = new \www\p3\model\PostManager();
    $articles = $postManager->getArticles();
    
    }
    */
}