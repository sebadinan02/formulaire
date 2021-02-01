<?php

$bdd = new PDO('mysql:host=localhost;dbname=formulaire','root','');
$name = $_POST['name'];
$mail = $_POST['mail'];
$password = $_POST['password'];

if(!empty($_POST['name']) AND !empty($_POST['mail']) AND!empty($_POST['password']))
  echo "ok";
  else
{
  echo "Tous les champs doivent être renseignés";
}
 $insertmbr= $bdd->prepare("INSERT INTO administrateur(username, mail, password) VALUES (?, ?, ?)");
 $insertmbr->execute(array($name, $mail, $password));
 $erreur="votre compte a bien été créé!";
 if(isset($_POST['formulaire']))
 {
  $name=htmlspecialchars($_POST['name']);
  $mail=htmlspecialchars($_POST['mail']);
  $password=sha1($_POST['password']);
 }
  $namelenght= strlen($name);
  if($namelenght <= 255){

  }else
  {
    $erreur = "votre nom ne doit pas excéder 255 caractères!";
  }
  
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){

    } else
  {
    $erreur= "votre adresse email n'est pas valide";
  }
  
if(isset($erreur))
{
  echo $erreur;
}
?>