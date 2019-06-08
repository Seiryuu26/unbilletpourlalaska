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
<html >

  <head >

        <meta charset = "utf-8" />

      <!--Le script du head-->

      <script src = "https://www.google.com/recaptcha/api.js" ></script >

     <title > Un billet pour </title >

  </head >

  <body >

      <form method = "post" action = "" >

          <!--Notre boite de vérification-->

          <div class="g-recaptcha" 

          data - sitekey = "6LfZq2EUAAAAAK4WBaZliXqzTcZyPAJwS6cXTYo_" >

          </div >

          <input type = "submit" id = "valider" value = "valider" />

      </form >

  </body >

</html >

  catch(Exception $e) {
    $errorMessage = $e->getMessage();
    //require('view/errorView.php');
    echo $errorMessage;
}

