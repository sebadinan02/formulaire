<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=formulaire','root','');
if(isset($_SESSION['id']) AND $_SESSION['id'] == 1)
{

}
if(isset($_GET['confirme']) AND !empty($_GET['confirme']))
{
    $confirme = (int) $_GET['confirme'];

    $req = $bdd->prepare('UPDATE user SET confirme = 1 WHERE id = ?');
    $req->execute(array($confirme));
}
if(isset($_GET['supprime']) AND !empty($_GET['supprime']))
{
    $supprime = (int) $_GET['supprime'];

    $req = $bdd->prepare('DELATE FROM user SET confirme = 1 WHERE id = ?');
    $req->execute(array($supprime));
}
$user=$bdd->query('SELECT * FROM user');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrateur</title>
</head>
<body>
   
<ul>
    <?php while($m = $user->fetch()) {?>
        <li>
            <?= $m['id'] ?> : <?= $m['nom'] ?> - 
            <?php if($m['envoyer']== 0) {?>
                <a href=
        "formulaire.php?confirme=<?= $m['id'] ?>">Confirmer</a>
        <a href=
        "formulaire.php?supprime=<?= $m['id'] ?>">Supprimer</a>
            <?php } ?>
        </li>
    <?php } ?>
</ul>

</body>
</html>