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
                throw new Exception ('Any identifiant de billet send');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['content'])) {
                    addComment($_POST);
                } else {
                    throw new Exception (' all the fields are not filled !');
                }
            } else {
                throw new Exception (' Any identifiant de billet send');
            }
        } 
      elseif ($_GET['action'] == 'login') {
            
          if (empty($_SESSION['pseudo']) OR empty($_SESSION['id'])) 
                login();
          else header('Location: index.php?action=board');


             
              }

       else if ($_GET['action'] == 'connexion') {

                    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                        connexion($_POST['pseudo'], $_POST['password']);
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
            
                       
             signalComment($_GET['id']);
            
             }
        elseif (!empty($_SESSION['pseudo']) && !empty($_SESSION['id'])){
             
            if ($_GET['action'] == 'logout') {  
            
                       
            
             logout();
            
             }
                
        elseif ($_GET['action'] == 'addPost') {  
            
                       
            // $postchapitre, $titre, $contenu
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                addPost($_POST['title'],$_POST['content']);   
                } else {
                    throw new Exception (' Error of submission !');
                }
        }
        elseif ($_GET['action'] == 'erasePost') {  
            
                       
            
             erasePost($_GET['id']);
            
             }
        elseif ($_GET['action'] == 'modifyPost') {
            
             if (!empty($_POST['title']) && !empty($_POST['content'])) {
                domodifyPost($_POST);
                } else {
                 //Call to function to display the form 
                     modifyPost($_GET['id']);
                }
            
            
                       
            
             }
             
        elseif ($_GET['action'] == 'eraseComment') {  
            
                       
            
             eraseComment($_GET['id']);
            
             }
        
             
        elseif ($_GET['action'] == 'board') {  
             
                       
            
             board();
           
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
         }
        
       
        elseif ($_GET['action'] == 'board')
    
    header('Location: index.php?action=login');
        
        
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



