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
           <div class="g-recaptcha" 

          data-sitekey="6LfZq2EUAAAAAK4WBaZliXqzTcZyPAJwS6cXTYo_">

          </div>     

                <p>
                <input class="btn btn-success" type="submit" value="Login" required /></p> </form>
        </div>
   




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
