<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=formulaire','root','');


    $mailconnect=$_POST['mailconnect'];
    $passwordconnect=$_POST['passwordconnect'];
    if(!empty($mailconnect) AND !empty($passwordconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM administrateur WHERE mail = ?");
        $requser->execute(array($mailconnect));
        $data=$requser->fetch();
        if ($data) {
            
            if($passwordconnect==$data['password'])
                echo 'connection OK';
            else 
                echo 'connection echoue';
                
        } else {
            echo 'connection echoue';
        }
    }
        

?>
