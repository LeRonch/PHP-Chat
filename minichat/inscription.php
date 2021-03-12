<?php

try
{
    $bdd = new PDO('mysql:host=php.loc;dbname=minichat;charset=utf8', 'root', '');
     $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

 if (isset($_GET["message"])){
   echo ("<script>alert(\"Pseudo déjà existant !\")</script>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

<div id="container">

    <h1>INSCRIPTION</h1>
    
    <br>


    <form action="traitement/traitement-inscription.php" method="post">

        <p>
        <label>Choisir pseudo : 
        <input name="user_pseudo" type="text"/></label>
        </p>
        
        <p>

        <label>Choisir mot de passe : 
        <input type="password" name="user_password"/></label>

        </p>

        <label>Adresse IP : 
        <input readonly = "readonly" name="ip" type="ip" value="<?php
        $add = $_SERVER['REMOTE_ADDR'];
        echo $add;?> "/>
        </label>
<br><br>

        <button class="bouton1" type="submit" value="Envoyer">Créer le compte</button>

    </form>

</div>

</body>
</html>