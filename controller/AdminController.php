<?php
namespace www\p3;
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

class AdminController{
    function connexion($pseudo,$motdepasse) {
        $adminManager = new \www/p3/AdminManager();
        $resultat = $adminManager->connected($pseudo,$motdepasse);


        /**
        file who is in charge for login and logout
         *
         */

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {

            $_SESSION['id'] = $resultat('id');
            $_SESSION['pseudo'] = $pseudo;
            header('Location: index.php?action=board');
            echo ('Vous êtes connecté !');




        }
    }

    public function deleteSession() {

// Suppression des variables de session et de la session
        session_destroy();

// Suppression des cookies de connexion automatique
        header('Location: index.php');
    }


}