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



$reponse = $bdd->query(
    'SELECT chat_msgs.*, user.user_pseudo, user.user_id, user.user_color
    FROM chat_msgs, user
    WHERE chat_msgs.msg_userId = user.user_id
    ORDER BY msg_id');

while ($donnees = $reponse->fetch())
{

    echo '<p><strong><span style="color:'.$donnees['user_color'].';">' . htmlspecialchars($donnees['user_pseudo']) . '</span> le  '.htmlspecialchars($donnees['msg_time']). ' : </strong> ' . htmlspecialchars($donnees['msg_text']) . '</p>';

    
};
