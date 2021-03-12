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



if(!empty($_POST['msg_text']))
{

$addmsg = $bdd->prepare(
    'INSERT INTO chat_msgs(msg_userId, msg_text) 
    VALUES(:msg_userId, :msg_text)');

$addmsg->execute(array(
        'msg_userId' => $_SESSION['user_id'],
        'msg_text' => $_POST['msg_text']
));

}
