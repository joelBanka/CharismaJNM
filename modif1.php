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
      <a class="navbar-brand" href="#">Accueil</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Enrégistrements <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input class="form-control" placeholder="Rechercher" type="text">
        </div>
        <button type="submit" class="btn btn-danger">Rechercher</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Déconnection</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="col-sm-6">
  
<h1 class="btn btn-info btn-lg btn-block">SCRIPT CULTE </h1>
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
<body>
  <?php
    //connection au serveur:
   try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdCharisma;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur de connexion à la base de données: '.$e->getMessage());
}
 
    //requête SQL:
   $requete = $bdd->query('SELECT * FROM script ORDER BY id');
 ?>
  
    //affichage des données:
  
 <?php   while( $result = $requete -> fetch())
    {
      ?>
     
      <?php
       echo(
           "<div align=\"center\">"
           .$result['nom']." ".$result['prenom']
           ." <a href=\"modif2.php?idOperateur=".$result['id']."\">modifier</a></div>\n"
       ) ;
    }
  ?>
</body>
</html>

