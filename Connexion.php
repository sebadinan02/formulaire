<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=formulaire','root','');

if(isset($_POST['formconnexion']))
{
    $emailconnect=htmlspecialchars($_POST['emailconnect']);
    $mdpconnect=sha1($_POST['mdpconnect']);
    if(!empty($emailconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND mot_de_passe = ?");
        $requser->execute(array($emailconnect, $mdpconnect));
        $userexist = $requser->rowcount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['email'] = $userinfo['email'];
            
        }
        else
        {
            $erreur = "Mauvais email ou mot de passe";
        }
    }
    else
    {
        $erreur= "Tous les champs doivent être complétés!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div align="center"> 
     <h2>Connexion</h2>
     <br/><br/>
         <form method="POST" action="">
            <input type="email" name="emailconnect" placeholder="email">
            <br/><br/>
            <input type="password" name="mdpconnect" placeholder="mot de passe">
            <br/><br/>
            <input type="submit" name="formconnexion" value="se connecter">
        </form>
        
    </div>
</body>
</html>
