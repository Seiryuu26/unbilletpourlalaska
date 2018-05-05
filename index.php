<?php
 session_start();
require('controller/frontend.php');
require('controller/backend.php');


try {
    /**
    *partfrontend.php
    *
    */
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
            
          if (empty($_SESSION['pseudo']) OR empty($_SESSION['id'])) 
                login();
          else header('Location: index.php?action=board');


             
              }

       else if ($_GET['action'] == 'connexion') {

                    if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
                        connexion($_POST['pseudo'], $_POST['motdepasse']);
                    } else {
                        throw new Exception (' Tous les champs ne sont pas complets !');
                    }
                }
        /**
        *partBackend
        *the following part lead to the controller backend backend.php
        look for the method name to match the action (method board)
        */
        elseif ($_GET['action'] == 'board') {  
            if (!empty($_SESSION['pseudo']) && !empty($_SESSION['id'])) 
                       
            
             board();
            else header('Location: index.php?action=login');
             }
         elseif ($_GET['action'] == 'logout') {  
            
                       
            
             logout();
            
             }
        elseif ($_GET['action'] == 'signalComment') {  
            
                       
            
             signalComment($_GET['id']);
            
             }
         elseif ($_GET['action'] == 'eraseComment') {  
            
                       
            
             eraseComment($_GET['id']);
            
             }
        elseif ($_GET['action'] == 'moderateComment') {  
            
                       
            
             moderateComment($_GET['id']);
            
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

