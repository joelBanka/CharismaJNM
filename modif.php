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
            var secondes = 0;
            var timer;
            var pause = false;
            var text = "";
             
            function IndiquerMinutes(min)
            {
                secondes = min * 60;
            }
            function Chrono()
            {
                if (secondes >= 0)
                {
                    var minutes = Math.floor(secondes/60);
                    var heures = Math.floor(minutes/60);
                    secondes -= minutes * 60;
                    if (heures >= 0)
                    {
                        minutes -= heures * 60;
                        if (minutes >= 0)
                        {
                            text = "Vous avez mis: " + heures + ' h ' + minutes + ' min ' + secondes + ' sec';
                        }
                        else
                        {   
                            text = "Vous avez mis: " + heures + ' h ' + secondes + ' sec';
                        }
                        minutes = minutes + (heures * 60);
                        secondes = secondes + (minutes * 60) + 1;
                         
                    }
                    else if (minutes > 0)
                    {
                        text = "Vous avez mis: " + minutes + ' min ' + secondes + ' sec';
                        secondes = secondes + (minutes * 60) + 1;
                    }
                    else
                    {
                        text = "vous avez mis: " + secondes + ' sec';
                        secondes = secondes + (minutes * 60) + 1;
                    }
                }
                else
                {
                    clearInterval(timer);
                    text = "Saisissez un nombre different de zéro";
                }
                document.getElementById('chrono').innerHTML = text;
            }
            function DemarrerChrono()
            {
                timer = setInterval('Chrono()', 1000);
                document.getElementById('btn_dem').style.display = 'none';
                document.getElementById('btn_stop').style.display = 'inline';
                document.getElementById('btn_pause').style.display = 'inline';
                 
            }
            function ArreterChrono()
            {
                clearInterval(timer);
                document.getElementById('btn_dem').style.display = 'inline';
                document.getElementById('btn_stop').style.display = 'none';
                document.getElementById('btn_pause').style.display = 'none';
            }
            function PauseChrono()
            {
                if (!pause)
                {
                    pause = true;
                    clearInterval(timer);
                    text = '[EN PAUSE] ' + text;
                    document.getElementById('chrono').innerHTML = text;
                    document.getElementById('btn_stop').style.display = 'none';
                    document.getElementById('btn_pause').value = 'Reprendre';
                }
                else
                {
                    pause = false;
                    DemarrerChrono();
                    document.getElementById('btn_pause').value = 'Pause';
                }
            }
             
        </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<!--body-->

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
      <a class="navbar-brand" href="accueil.php">Accueil</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="admin.php"><span class="sr-only">(current)</span></a></li>
        <li><a href="#"></a></li>
        <li class="dropdown">
          <a href="admin.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Enrégistrements <span class="caret"></span></a>
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
      <form class="navbar-form navbar-left" role="fsearch"method="GET"action="rechCharisma.php">
        <div class="form-group">
          <input class="form-control" name="motclef"placeholder="Rechercher" type="text">
        </div>
        <button type="submit" class="btn btn-danger">Rechercher</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Déconnection</a></li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="btn btn-info btn-lg btn-block">Page de modification</h1>
<div class="col-sm-12">
  
<!--<h1 class="btn btn-info btn-lg btn-block">SCRIPT CULTE </h1>-->
   </br>
    <div>
      <form name="f_chrono">
            <label for="saisie">Entrez le temps voulu en minutes : </label>
            <input type="text" name="saisie" style="text-align: right;" /><br />
            <input type="button"class="btn btn-success" name="btn_dem" id="btn_dem" placeholder="00h00min00s"value="Démarrer" onclick="IndiquerMinutes(f_chrono.saisie.value); DemarrerChrono();" />
            <input type="button"class="btn btn-danger" name="btn_stop" id="btn_stop" placeholder="00h00min00s" value="Arreter !" onclick="ArreterChrono();" style="display: none;" />
            <input type="button" class="btn btn-warning" name="btn_pause" id="btn_pause" placeholder="00h00min00s" value="Pause" onclick="PauseChrono();" style="display: none;" />
        </form>
        <p id="chrono"></p>
    </div>

</div>
 
 

<?php

// Connexion à la base de données
/*if(isset ($_POST) && !empty($_POST['timing'])&&!empty($_POST['nom'])&&!empty($_POST['prenom'])
  &&!empty($_POST['titre'])&&!empty($_POST['auteur']) &&!empty($_POST['action'])&&!empty($_POST['message'])){*/
  if(isset ($_POST) ){
/*$timing=$_POST['timing'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$titre=$_POST['titre'];
$auteur=$_POST['auteur'];
$action=$_POST['action'];
$message=$_POST['message'];*/
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=bdcharisma;charset=utf8', 'root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$idA=$_GET['idM'];
//var_dump($idA);
// Récupération des 10 derniers messages
$sql='SELECT * FROM script WHERE id='.$idA;
//echo $sql;
$reponse = $bdd->query($sql);
 if ($donnees = $reponse->fetch())
 {
  echo"";
 ?>
  <!--formulaire de modif-->
</br>
<div class="col-sm-8">
 <form class="" method="POST" action="modif3.php">

<div class="header">
   </br>
  </div>

  <div class="form-group">
   <div class="form-group">
 <label for="timing"></label>
  <input type="hidden" class="form-control" name="idM" placeholder="" value="<?php echo $donnees['id']; ?>"/>
   <p class="help-block"></p>
  </div>
  
  </div>
  <div class="form-group">
 <label for="timing">Timing</label>
  <input class="form-control" name="timing" placeholder="00:00:00" value="<?php echo $donnees['timing']; ?>"/>
   <p class="help-block"></p>
  </div>
  
  <div class="form-group">
 <label for="nom">Nom opérateur</label>
  <input class="form-control" name="nom" placeholder="nom" value="<?php echo $donnees['nom']; ?>"/>
   <p class="help-block"></p>
  </div>
  
    
  <div>
 <label for="prénom">Prénom</label>
  <input class="form-control" name="prenom" placeholder="prenom"value="<?php echo $donnees['prenom']; ?>"/>
   <p class="help-block"></p>
    </div>
  
  <div>
 <label for="titre"> TITRE DU CULTE</label>
  <input class="form-control" name="titre" placeholder="titre"value="<?php echo $donnees['titre']; ?>"/>
   <p class="help-block"></p>
    </div>
  
  <div class="container">
<br> <label for="auteur"> Auteur de l'action</label> </br>
    <label for="auteur" class="radio-inline" for="pasteur">
      <input for="auteur" type="radio" name="auteur" value="pasteur"<?php if($idA=$_GET['idM']&& $auteur=$donnees['auteur']) echo 'checked="checked"'; ?>/> PASTEUR PEDRO
    </label>
    <label for="auteur" class="radio-inline" >
      <input type="radio" name="auteur" value="invite"<?php if($idA=$_GET['idM']&&$donnees['auteur']) echo 'checked="checked"'; ?> /> INVITE
    </label>
    <label class="radio-inline" for="autres">
      <input type="radio" name="auteur" value="autres"<?php if($idA=$_GET['idM']&&$donnees['auteur']) echo 'checked="checked"'; ?>/> AUTRES 
    </label> 

</div>
  
  <br> </br>
  <div>
 <label for="name"> Nom de l'action</label>
  <input class="form-control" name="action" placeholder="Nom de l'action"value="<?php echo $donnees['action']; ?>"/>
   <p class="help-block"></p>
    </div>
  
<div class="form-group">
 <label for="comment">Informations complémentaires</label>
 <textarea class="form-control" rows="5" id="comment" name="message" placeholder="message"value=""><?php echo $donnees['message']; ?></textarea>
  </div>
  <button type="submit" class="btn btn-danger">Modifier</button>
</form>
</div>

<?php
}
//var_dump($donnees);
//header('Location: ident.php');
//$sql->closeCursor();
$bdd = null;
exit();
}else echo"raté";
?>
</body>
</html>