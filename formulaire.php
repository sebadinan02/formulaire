<?php

$bdd = new PDO('mysql:host=localhost;dbname=formulaire','root','');
$nom = $_POST['nom'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];

if(!empty($_POST['nom'] AND !empty($_POST['email']) AND!empty($_POST['mdp'])))
  echo "ok";
  else
{
  echo "Tous les champs doivent être renseignés";
}
 $insertmbr= $bdd->prepare("INSERT INTO user(nom, email, mot_de_passe) VALUES (?, ?, ?)");
 $insertmbr->execute(array($nom, $email, $mdp));
 $erreur="votre compte a bien été créé!";
 if(isset($_POST['formulaire']))
 {
  $nom=htmlspecialchars($_POST['nom']);
  $email=htmlspecialchars($_POST['email']);
  $mdp=sha1($_POST['mdp']);
 }
 $nomlenght= strlen($nom);
 if($nomlenght>255){
    $erreur = "votre nom ne doit pas excéder 255 caractères!";
  }
  
  {
    $erreur= "votre adresse email n'est pas valide";
  }
  
if(isset($erreur))
{
  echo $erreur;
}

?>