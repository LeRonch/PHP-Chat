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

include 'RandomColor.php';
use \Colors\RandomColor;

if ((empty($_POST["user_pseudo"])) || (empty($_POST["user_password"]))) 
{ 
    header('Location: /minichat/inscription.php?message=Veuillez remplir tous les champs !');
    die;
}

$color = RandomColor::one(array('format'=>'hex'));

$username = $_POST['user_pseudo'];
$stmt = $bdd->prepare(
    "SELECT user.user_pseudo 
    FROM user 
    WHERE user_pseudo=?");
$stmt->execute([$username]); 
$user = $stmt->fetch();
if ($user) {
    header('Location: /minichat/inscription.php?message=Pseudo déjà existant !.');
 
}
else
{
$req = $bdd->prepare(
    'INSERT INTO user(user_pseudo, user_password, ip, user_color, statut) 
    VALUES(:user_pseudo, :user_password, :ip, :user_color, :statut)');

$req->execute(array(
        'user_pseudo' => $_POST["user_pseudo"],
        'user_password' => $_POST["user_password"],
        'ip' => $_POST["ip"],
        'user_color' => $color,
        'statut' => 'user'
));

header('Location: /minichat/index.php?message=Votre compte a bien été créé.');}