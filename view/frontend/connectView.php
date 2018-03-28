<?php 
session_start();?>
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
