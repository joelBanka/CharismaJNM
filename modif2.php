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
 
	 		//récupération de la variable d'URL,
	  		//qui va nous permettre de savoir quel enregistrement modifier
  			$id  = $_GET["idOperateur"] ;
 
  			// EXECUTION requête SQL:
  			$requete = $bdd->query("SELECT * FROM script WHERE id = ".$id) ;
 
 var_dump($id);
 
  //affichage des données:
  if( $result = $requete->fetch() )
   {
  ?>

<form name="modification" action="modif3.php" method="POST">
  <input type="hidden" name="id" value="<?php echo($id) ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
    	<td>nom</td>
      	<td><input type="text" name ="nom" value ="<?php echo($result['nom']);?>"></td>
    </tr>
    <tr align="center">
      <td>prenom</td>
      <td><input type="text" name="prenom" value="<?php echo($result['prenom']) ;?>"></td>
    </tr>
    
    <tr align="center">
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>



  <?php
  }//fin if 
  ?>


    </body>

 </html>
