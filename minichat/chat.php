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

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in']) || !isset($_SESSION['user_pseudo'])){
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>

<body id="bodyz">


<div id="container">
	<h1>MINICHAT</h1>

    <p><?php echo 'Vous êtes connecté en tant que <strong>'.$_SESSION['user_pseudo'].'</strong>';?></p>
    <p>Déconnexion : <a href="traitement/logout.php">❎</a></p>


        <table class="chat">
                <tr>		
            <td valign="top" id="text-td">


                <div style="color:black;overflow-y: auto;" class="textchat" id="text">

                    <?php    
                    include ('loadmessage.php');
                    ?>

                </div>
            </td>
                    
            <td valign="top" id="users-td">

        <?php 
                $reponse = $bdd->query('SELECT * FROM user');
                while ($donnees = $reponse->fetch()){

            if ($_SESSION["statut"] === "user"){

            echo   '<div style="text-align:center;overflow:auto;color:'. $donnees["user_color"].'"> ' . $donnees["user_pseudo"] .' <hr> </div>';}

            else
            {
                echo   '<div style="text-align:center;overflow:auto;color:'. $donnees["user_color"].'"> ' . $donnees["user_pseudo"] .'<a style="float:right" href="traitement/delete-user.php?id='. $donnees["user_id"].'"> ❌</a> <hr> </div>';
            }
            } 

        ?>

            </td>

        </tr>

    </table>


        <table class="post_msg">

          
                <tr>
                <td>

                <label id="msg" for="message">Message :</label>
                <input type="text" name="msg_text" id="message" maxlength="255" />

                <button class="bouton2" type="button" onclick="sendMessage()" id="post">Send ! ⤊</button>

                
                </td>
                </tr>
            

        </table>


</div>

<script src="main.js"></script>
</body>

</html>