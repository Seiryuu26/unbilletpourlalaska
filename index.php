<?php
require('controller/frontend.php');
require('controller/backend.php');



try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception ('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception (' Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception (' Aucun identifiant de billet envoyé');
            }
        } 
      elseif ($_GET['action'] == 'login') {
            

                login();
          
             
              }

       else if ($_GET['action'] == 'connexion') {

                    if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
                        connexion($_POST['pseudo'], $_POST['motdepasse']);
                    } else {
                        throw new Exception (' Tous les champs ne sont pas complets !');
                    }
                }

            
        

}

else {
    listPosts();
}
  }
catch(Exception $e) { 
    $errorMessage = $e->getMessage();
    //require('view/errorView.php');
    echo $errorMessage ;
}

