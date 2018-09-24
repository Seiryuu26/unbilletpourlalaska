<?php
 session_start();
require('controller/FrontOffice.php');
require('controller/BackOffice.php');
use \www\p3\controller\FrontOffice;
use \www\p3\controller\BackOffice;


try {
    /**
    *partfrontend.php
    *
    */
    $frontoffice = new FrontOffice();// Création d'une instance
    $backoffice = new BackOffice();// Création d'une instance
    
        
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listPosts') {
                $frontoffice->listPosts();
            } elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontoffice->post();
                } else {
                    throw new Exception ('Any identifiant de billet send');
                }
            } elseif ($_GET['action'] == 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['content'])) {
                    $frontoffice->addComment($_POST);
                    } else {
                        throw new Exception (' all the fields are not filled !');
                    }
                } else {
                    throw new Exception (' Any identifiant de billet send');
                }
            } 
          elseif ($_GET['action'] == 'login') {

              if (empty($_SESSION['pseudo']) OR empty($_SESSION['id'])) {  
                  $login= $backoffice->login();// Appel d'une fonction de cet objet
                }
              else header('Location: index.php?action=board');



                  }

           else if ($_GET['action'] == 'connexion') {

                        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                        $backoffice->connexion($_POST['pseudo'], $_POST['password']);
                        } else {
                            throw new Exception (' all the fields are not completed  !');
                        }
                    }
        /**
        *partBackend
        *the following part lead to the controller backend backend.php
        look for the method name to match the action (method board)
        */
        elseif ($_GET['action'] == 'signalComment') 
            {
            
                       
            $frontoffice->signalComment($_GET['id']);
            
             }
        elseif (!empty($_SESSION['pseudo']) && !empty($_SESSION['id'])){
             
            if ($_GET['action'] == 'logout') {  
            
                       
            
            $backoffice->logout();
            
             }
                
        elseif ($_GET['action'] == 'addPost') {  
            
                       
            // $postchapitre, $titre, $contenu
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
               $backoffice->addPost($_POST['title'],$_POST['content']);   
                } else {
                    throw new Exception (' Error of submission !');
                }
        }
        elseif ($_GET['action'] == 'erasePost') {  
            
                       
            
            $backoffice->erasePost($_GET['id']);
            
             }
        elseif ($_GET['action'] == 'modifyPost') {
            
             if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $backoffice->domodifyPost($_POST);
                } else {
                 //Call to function to display the form 
                 $backoffice->modifyPost($_GET['id']);
                }
            
            
                       
            
             }

             
        elseif ($_GET['action'] == 'board') {  
             
                       
            
             $backoffice->board();
           
             }
         elseif ($_GET['action'] == 'logout') {  
            
                       
            
              $backoffice->logout();
            
             }
        elseif ($_GET['action'] == 'signalComment') {  
            
                       
            
            $frontoffice->signalComment($_GET['id']);
            
             }
         elseif ($_GET['action'] == 'eraseComment') {  
            
                       
            
           $backoffice->eraseComment($_GET['id']);
            
             }
         }
        
       
        elseif ($_GET['action'] == 'board')
    
    header('Location: index.php?action=login');
        
        
}

else {
        $frontoffice->listPosts();
}
  }
catch(Exception $e) { 
    $errorMessage = $e->getMessage();
    //require('view/errorView.php');
    echo $errorMessage ;
}



