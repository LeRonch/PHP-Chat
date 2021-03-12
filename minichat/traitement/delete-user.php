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

$deleteRdvStatement = $bdd->prepare('DELETE FROM user WHERE user_id =?');
$deleteRdvStatement ->execute([
    $_GET["id"]
]);

header("Location:/minichat/chat.php");