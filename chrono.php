<!Doctype html>
<html lang="fr">

	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext" type="text/css" media="all" />
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
		 <script src="http://www.cabyan.com/bootstrap/js/jquery.js"></script>
    <script src="http://www.cabyan.com/bootstrap/js/bootstrap.min.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head>
    <body>
       <form name="f_chrono">
            <label for="saisie">Entrez le temps voulu en minutes : </label>
            <input type="text" name="saisie" style="text-align: right;" /><br />
            <input type="button" name="btn_dem" id="btn_dem" placeholder="00h00min00s"value="Démarrer" onclick="IndiquerMinutes(f_chrono.saisie.value); DemarrerChrono();" />
            <input type="button" name="btn_stop" id="btn_stop" placeholder="00h00min00s" value="Arreter !" onclick="ArreterChrono();" style="display: none;" />
            <input type="button" name="btn_pause" id="btn_pause" placeholder="00h00min00s" value="Pause" onclick="PauseChrono();" style="display: none;" />
        </form>
		<!--<p id="chrono"><p>-->
		<form action="" method="post">
    <fieldset class="wrapper">
        <legend>Formulaire de saisie</legend>
        <div class="imgHolder">
        </div>
        <fieldset class="operateurform">
		<?php    
 // require 'sqlconnect.php'; 
try
{
 // $bdd = new PDO('mysql:host=majestytwx.mysql.db;dbname=majestytwx', 'majestytwx', 'fJCm5SN4sPsA');
 $bdd = new PDO('mysql:host=localhost;dbname=bdCharisma;charset=utf8', 'root', '');
  //$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
} 
     
  $query = 'SELECT * FROM charisma ORDER BY id DESC LIMIT 8;';
$prep = $bdd->prepare($query);
$prep->execute();
$arrAll = $prep->fetchAll();
 
if(!empty($arrAll))
{
	//echo '<h3 class= "alert btn-default">Les enr&eacute;gistrements disponibles:</h3>';
	 // echo('<h4>Les enrégistrements de la base de données<h4>'.'<br/>');
	 
	echo('<table width="350px" height=""><tr class=success"><td width="20px">'.'ID'.'-</td>'.'<td width="40px">'.'Titre'.'</td>'
		      .'<td width="30px">'.'Min'.'</td>'.'<td width="80px">'.'Actions'.'</td>'
			  .'<td width="40px">'.'Acte'.'</td>'.'<td width="30px">'.'Stat'.'</td>'
			  .'</td>'.'<td width="10px">'.'RE'.'</td>'
			  .'<td class="col-md-1"><!--'.'  <a href="modifier.php">modifier</a>'.'-->
			  </td></tr></table>');
	foreach($arrAll as $arr)
	{
		//echo '<br />';
		
		/*echo('<p color:red> '.'-'.' '.$arr[id].' '.$arr[nom].' '.$arr[prenom].' '.$arr[reference]
		.' '.$arr[adresse].' '.$arr[message].' '.'<a href="modifier.php">modifier</a>'.'</p>');*/
		echo('<div class="conteneur">');
		echo('<table width="350px" height="10px" class="tb"><tr class="r"><td width="20px">'.$arr[id].'-</td>'.'<td width="50px" class="d">'.$arr[titre].'</td>'
		      .'<td width="50px"class="d">'.$arr[minutage].'</td>'.'<td width="120px"class="d">'.$arr[action].'</td>'
			  .'<td class="d" width="50px">'.$arr[acteur].'</td>'.'<td class="d" width="30px">'.$arr[statut].'</td>'
			  .'<td class="d" width="10px">'.$arr[retro].'</td>'
			  .'<td class="d" width="20px">'.'  <a href="modifier.php">modifier</a>'.'
			  </td></tr></table>');
	
			echo('</div>');
           
	}
}
else
{
	echo 'Aucun résultat disponible.';
}   
?>
           <!-- <legend>Operateur</legend>
            <label>Nom</label><br />
            <input type="text" /><br />
            <label>Prenom</label><br />
            <input type="text" />-->
		
        </fieldset>
		  <button class="bouton" style="background-color:red;color:white;margin-left:25px;" onclick="myFunction1()">  Debut du culte </button>
		  <form>
            <label for="saisie">Entrez le temps voulu en minutes : </label>
            <input type="text" name="saisie" style="text-align: right;" /><br />
            <input type="button" name="btn_dem" id="btn_dem" value="Démarrer" onclick="IndiquerMinutes(f_chrono.saisie.value); DemarrerChrono();" />
            <input type="button" name="btn_stop" id="btn_stop" value="Arreter !" onclick="ArreterChrono();" style="display: none;" />
            <input type="button" name="btn_pause" id="btn_pause" value="Pause" onclick="PauseChrono();" style="display: none;" />
		</form>
		<div style="width:500px;margin-left:auto;margin-right:auto;">
		<div> 
	<p id="demo"></p>

	 
<script>

function myFunction1() {
    //var d = new Date();
	//var x = document.getElementById("demo");
    var firstHours = new Date().getHours();// On obtient le timestamp avant l'exécution
	var firstMinutes = new Date().getMinutes();
	alert("Debut: "+firstHours+"h"+firstMinutes); 
	return firstTimestamp;
}
</script>

	<p id="chrono"></p>
        <div class="blockCulte">
            <label style="margin-left:70px;">Titre du culte</label><br />
            <input type="text" name="titre" style="margin-top: 10px;width:250px;align:right;" />
        </div>
		
        <div class="dataHolder">
		<table>
		<tr>
		
		<td>
            <table class="b" cellpadding="0" cellspacing="0">
                <tr>
                    <th name="minutage">Minutage</th>
                    <th name="action">Actions</th>
                    <th name="acteur">Acteurs</th>
					<th name="statut">Statuts</th>
                </tr>
                <tr>
                    <td><input id="chrono" name="minutage" type=text" value="" placeholder="00:00:00" /></td>
					
                    <td><input name="action" type="text" value="" placeholder="actions"</td>
					<td><input name="acteur" type="text" value="" placeholder="acteurs"</td>
                    <td>
                        <select name="statut">
                            <option value="val1">val 1</option>
                            <option value="val2">val 2</option>
                            <option value="val3">val 3</option>
                            <option value="val4">val 4</option>
                        </select>

                    </td>
                </tr>
              
            </table>
			</td>
			<td>Retroaction<input type="radio" value="oui" name="retro" />: Oui</br>
			<input type="radio" value="non" name="retro" />: Non</td>
		</tr>
		</table>
			<br/>
			<br/>
		    <br/>
			
			<input class="bouton"  type="submit" style="background-color:green;color:white;margin-left:25px; width:325px;" value=" Ajouter"onclick="(myFunction3(x1,x2))" />

		</div>	
		</div >
        </div>
		 
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
         <input class="bouton" type="submit" style="background-color:red;color:white;"  value="  Fin du culte"onclick="myFunction2()"  />
		 			<p id="dem"></p>	
<script>

function myFunction2() {
    var d = new Date();
	var x = document.getElementById("dem");
     var n1=(d.getMinutes());
	var n2=(d.getHours());
	var res2=(n2*60)+n1;
	alert(res2);
	return res2;
}
</script>
<script>
function myfunction3(x1,x2){
var res=x2-x1;
return res;
}
</script>
    
                </fieldset>
				</form>
</body>
</html>

<?php
if(!empty($_POST['titre'])&&!empty($_POST['minutage'])&&!empty($_POST['action'])&&!empty($_POST['acteur'])&&!empty($_POST['statut'])){
try
{
  $bdd = new PDO('mysql:host=majestytwx.mysql.db;dbname=majestytwx', 'majestytwx', 'fJCm5SN4sPsA');
  //$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo('réussi');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO charisma (titre, minutage, action, acteur, statut, retro) VALUES(?, ?, ?, ?, ?, ?)');

$req->execute(array($_POST['titre'], $_POST['minutage'], $_POST['action'], $_POST['acteur'], $_POST['statut'], $_POST['retro']));

if($req){
// Effectuer ici la requête qui insère le message
// Puis rediriger vers test.php comme ceci :
header('Location: formChurch.php');
//var_dump($req);
}else{
	echo('error');
	}
$req->closeCursor();
$bdd = null;
exit();
}
?>

        <p id="chrono"></p>
    </body>
</html>