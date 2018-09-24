<!DOCTYPE html>
<html lang="fr">
    
    <body>
<?php
echo "j affiche le contenu de _POST";        
var_dump($_POST); 
echo "j affiche le contenu de _GET";    
var_dump($_GET);     
echo "<h1>".$_GET["id"]."</h1>";  
    
    
    
 
        
        
?>        
    </body>