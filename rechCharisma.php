<?php
session_start();
require("auth.php");
if(Auth::isLogged()){

}else{
 header('Location:accueil.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>formulaire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
   <script type="text/Javascript">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin.php">Accueil</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"> <span class="sr-only">(current)</span></a></li>
        <li><a href="#"></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Enrégistrements <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="divider"></li>
            <li><a href="#"></a></li>
            <li class="divider"></li>
            <li><a href="#"></a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" name="fsearch"action="rechCharisma.php"method="POST">
        <div class="form-group">
          <input class="form-control"name="motclef" placeholder="Rechercher" type="text">
        </div>
        <button type="submit" class="btn btn-danger">Rechercher</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Déconnection</a></li>
      </ul>
    </div>
  </div>
</nav>

</form>

</body>
</html>
<?php
$serveur = "localhost";
$user= "root";
$passwd = "";
$bdd = "bdCharisma";

if (sizeof($_POST) > 0) 
{
	$connex = mysqli_connect($serveur, $user, $passwd, $bdd);
	
	if (mysqli_connect_errno()) 
	    die ("Echec de la connexion : ". mysqli_connect_error());
	
	$sql="SELECT * FROM script WHERE (`timing` LIKE '%".$_POST['motclef']."%'
   OR `nom` LIKE '%".$_POST['motclef']."%' OR `prenom` LIKE '%".$_POST['motclef']."%' 
   OR `titre` LIKE '%".$_POST['motclef']."%' OR `action` LIKE '%".$_POST['motclef']."%' 
    OR `message` LIKE '%".$_POST['motclef']."%') ";

    $result = mysqli_query($connex, $sql);  
	if (!$result)  die ("Probleme :  " . mysqli_error($connex));

	if (mysqli_num_rows($result) == 0)
	{
		echo "Nous n'avons pas trouvé de résultats";
	} else {
     
  echo' <table data-url="data1.json" data-height="299" class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Timing</th>
            <th>Nom </th>
            <th>Prenom</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Action</th>
            <th>Message</th>
            <th>Modif</th>
          </tr>
        </thead>
        <tbody>';		
        while( $donnees=mysqli_fetch_assoc($result) )       

		   {
		
    	//echo $row->timing." ".$row->nom." ".$row->prenom." ".$row->titre. " ".$row->action." ".$row->message."<br>";
		  echo' <tr>
            <td>'. htmlspecialchars($donnees['id']) .'</td>
            <td>'. htmlspecialchars($donnees['timing']) .'</td>
             <td>'. htmlspecialchars($donnees['nom']) .'</td>
              <td>'. htmlspecialchars($donnees['prenom']) .'</td>
               <td>'. htmlspecialchars($donnees['titre']) .'</td>
                <td>'. htmlspecialchars($donnees['auteur']) .'</td>
                 <td>'. htmlspecialchars($donnees['action']) .'</td> 
                 <td>'. htmlspecialchars($donnees['message']) .'</td>
                 <td><a href= "modif.php?idM='.($donnees['id']).'&timing='.($donnees['timing']).
                 '&nom='.($donnees['nom']).'&prenom='.($donnees['prenom']).
                 '&titre='.($donnees['titre']).'&auteur='.($donnees['auteur']).
                 '&action='.($donnees['action']).'&message='.($donnees['message']).
                 '">modifier</a></td></tr>';
               }
          
       echo'</br></tbody></table>';
       
    // echo '</table>';

    }
	
	mysqli_free_result($result);		
	mysqli_close($connex);
}

?>

