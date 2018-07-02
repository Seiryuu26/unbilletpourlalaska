<?php ob_start(); ?>

<div id="espace d'administration" class="span3 well well-large offset4">
        <div class="centreConnect">
            <h4>Connexion</h4>
            <br>
            <form action="?action=connexion" class="form" method="post" />
                <p>
                <input type="text" placeholder="Pseudo" name="pseudo" value="" />
                </p>
                <p>
                <input type="password" placeholder="Password" name="motdepasse" value="" required/>
                </p>
                <p>
                <input class="btn btn-success" type="submit" value="Login" required /></p> </form>
        </div>
    </div>
<html>

  <head>

        <meta charset="utf-8"/>

      <!-- Le script du head -->

      <script src="https://www.google.com/recaptcha/api.js"></script>

     <title>Un billet pour l'Alaska</title>

  </head>

  <body>

      <form method="post" action="">

          <!-- Notre boite de vérification -->

          <div class="g-recaptcha" 

          data-sitekey="6LfZq2EUAAAAAK4WBaZliXqzTcZyPAJwS6cXTYo_">

          </div>

          <input type="submit" id="valider" value="valider" />

      </form>

  </body>

</html>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
