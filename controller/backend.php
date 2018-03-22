<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');



function login()
{
    require('view/frontend/connectView.php');
}

function connexion($pseudo,$motdepasse)
{
        $adminManager = new \www/p3/AdminManager();
        $resultat = $adminManager->connected($pseudo,$motdepasse);


        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {

            session_start();
            $_SESSION['id'] = $resultat('id');
            $_SESSION['pseudo'] = $pseudo;
            header('Location: index.php?action=board');
            echo 'Vous êtes connecté !';




        }
}
function deleteSession()
{
        session_start();

// Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

// Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('motdepasse', '');
        header('Location: index.php');
}


