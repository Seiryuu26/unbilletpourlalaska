<?php
require('controller/AdminController.php');

try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'connexion') {
            {

                if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
                    connexion($_GET['pseudo'], $_GET['motdepasse']);
                } else {
                    throw new Exception (' Tous les champs ne sont pas remplis!');
                }


            }

        }


            if ($_GET['action'] == 'login') {

                if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
                    login($_GET['pseudo'], $_GET['motdepasse']);
                } else {
                    throw new Exception (' Tous les champs ne sont pas complets !');
                }
            }

    }
}

  catch(Exception $e) {
    $errorMessage = $e->getMessage();
    //require('view/errorView.php');
    echo $errorMessage ;
  }

