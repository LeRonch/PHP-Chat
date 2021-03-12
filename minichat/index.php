<?php
session_start();
try
{
    $bdd = new PDO('mysql:host=php.loc;dbname=minichat;charset=utf8', 'root', '');
     $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



if(isset($_POST['login'])){

    $user_pseudo = !empty($_POST['user_pseudo']) ? trim($_POST['user_pseudo']) : null;
    $passwordAttempt = !empty($_POST['user_password']) ? trim($_POST['user_password']) : null;
    
    $sql = 
    "SELECT * 
    FROM user 
    WHERE user_pseudo = :user_pseudo";

    $stmt = $bdd->prepare($sql);
    
    $stmt->bindValue(':user_pseudo', $user_pseudo);

    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($user === false){
        header('Location: index.php?=Information(s) erronée(s)');
        exit('Information(s) erronée(s)');
    } else{

    if($passwordAttempt == $user['user_password']){
            
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['logged_in'] = time();
            $_SESSION['user_pseudo'] = $user['user_pseudo'];
            $_SESSION['statut'] = $user['statut'];
            header('Location: chat.php');
            exit;
            
        } else{
            header('Location: index.php?=Information(s) erronée(s)');
            exit('');
        }
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="main.css"> 
</head>

<body>

<div id="container">

	<h1 style="text-transform:uppercase">Bienvenue sur le chat !</h1>

    <br>

    <form action="index.php" id="connexion" method="post">
     
        <strong>Entrez dans le chat :</strong>

        <br>
        <br>
        <br>

        <label>Pseudo : 
        <input name="user_pseudo" type="text"/></label>

       <br>
       <br>

        <label>Mot de passe : 
        <input name="user_password" type="password"/></label>

        <br>
        <br>

        <p><strong>
        <?php
        $add = $_SERVER['REMOTE_ADDR'];
        echo "IP: $add";?>
        </strong></p>
        
        <br>
        <br>
    
        <button class="bouton1" name="login" type="submit" value="Login">Connexion</button>
 
    </form>

    <br>
    <br>

<p class="inscription">Pas encore inscrit ?
    <br>
    <br>
<span>Clique Ici ➤</span><a href="inscription.php">❕</a>
</p>


</body>
</html>