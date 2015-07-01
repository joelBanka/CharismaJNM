<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Formulaire de modification</title>

    </head>

    <body>

   		<?php
  		// Connection à la base de donnée.
			try
			{
			    $bdd = new PDO('mysql:host=localhost;dbname=bdCharisma;charset=utf8', 'root', '');
			}

			catch(Exception $e)
			{
        		die('Erreur de connexion à la base de données: '.$e->getMessage());
			}

      $id = $_GET["idM"];
      echo $id;
       $timing = $_POST["timing"];
      echo $timing;

      $nom = $_POST["nom"];
      echo $nom;
      $prenom = $_POST["prenom"];
      echo $prenom;
       $titre = $_POST["titre"];
      echo $titre;
       $auteur[] = $_POST["auteur"];
      echo $auteur;
       $action = $_POST["action"];
      echo $action;
       $message = $_POST["message"];
      echo $message;


    if(!empty($timing) &&!empty($nom) && !empty($prenom)&& !empty($titre) &&!empty($auteur) &&!empty($action) &&!empty($message))
      {
        $req = $bdd->query("UPDATE script SET
                       timing='$timing',
                       nom = '$nom',
                       prenom =  '$prenom',
                       titre='$titre',
                       auteur='$auteur',
                       action='$action',
                       message='$message'
        WHERE id = '$id'") or die(mysql_error().'<br>');
        echo "Mise à jour effectué"; 

      }

      else
      {
        echo "Mise à jour non faite"; 
      }

    ?>
    </body>
</html>      
