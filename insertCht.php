<?php

// Connexion à la base de données
if(isset ($_POST) && !empty($_POST['timing'])&&!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['titre'])&&!empty($_POST['auteur']) &&!empty($_POST['action'])&&!empty($_POST['message'])){
$timing=$_POST['timing'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$titre=$_POST['titre'];
$auteur=$_POST['auteur'];
$action=$_POST['action'];
$message=$_POST['message'];
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=bdcharisma;charset=utf8', 'root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO script (timing, nom, prenom, titre, auteur, action,message) VALUES(?, ?, ?, ?, ?, ?,?)');
$req->execute(array($_POST['timing'], $_POST['nom'], $_POST['prenom'], $_POST['titre'], $_POST['auteur'], $_POST['action'], $_POST['message']));

//echo('réussi');

//var_dump($req);
//header('Location: ident.php');
$req->closeCursor();
$bdd = null;
exit();
}
?>