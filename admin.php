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
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="g-recaptcha" data-sitekey="6Ld32l4UAAAAADM4l879y-fNZ8br4c_I03InyQmH"></div>
    
  catch(Exception $e) {
    $errorMessage = $e->getMessage();
    //require('view/errorView.php');
    echo $errorMessage ;
  }

