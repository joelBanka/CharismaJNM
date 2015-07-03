<?php
include 'db.php';

$msg1 ='';
$msg2='';
$msg3='';
$nom='';
$prenom='';
$emptyData = TRUE; 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty ($_POST['nom']))
    {
        $emptyData = TRUE;
        $msg1 = "Le Champ Nom doit être rempli";      
    }
    else {
        $emptyData = FALSE;      
    }
    
    if(empty($_POST['prenom']))
    {
        $emptyData = TRUE;
        $msg2 = "Le Champ Prenom doit être rempli";  
    }
    else {
        $emptyData = FALSE;   
    }

    if(empty($_POST['mdp']))
    {
        $emptyData = TRUE;  
        $msg3 = "Entrer le mot de pass";
    }
    else {
        $emptyData = FALSE;    
    }

} 

if (isset ($_POST["nom"],$_POST["prenom"],$_POST["mdp"]) && !$emptyData){
    
    if(isGoodPasword($_POST["mdp"])){
       
        $entrer = insertionUtilisateur($_POST['nom'], $_POST['prenom']);
    }
    else{
        echo "insertion échouée";
    } 
        
    
}

/*$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

if (isset($_POST["nom"]) && ($_POST["prenom"]) )
{
echo $nom;
echo $prenom;
} */

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Formulaire_charisma</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Authentification</h1>
      </div>
      <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <input type="text" name="nom" class="form-control input-lg" placeholder="Nom">
            </div><div class="form-group">
              <input type="text" name="prenom" class="form-control input-lg" placeholder="Prenom">
            </div>
            <div class="form-group">
              <input type="password" name="mdp" class="form-control input-lg" placeholder="Mot de passe">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block " type="submit">Soumettre</button><br>
             <!-- <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>-->
             <?php 
             if (isset($_POST["nom"]))
             {
             echo '<center class="text-danger">'. $msg1. '<center>';
            }

              if (isset($_POST["prenom"]))
             {
             echo '<center class="text-danger">'. $msg2. '<center>';
            }
            if (isset($_POST["mdp"]))
             {
             echo '<center class="text-danger">'. $msg3. '<center>';
            }
             ?>
            </div>
          </form>
      </div>
      </!--><div class="modal-footer">
         <!-- <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
		  </div>	
      </div>-->
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
