<?php
function  Connect()
{
	$user = 'root';
	$pass = '';
	$hote = 'localhost';
	$port = '80';
	$base = 'script_action';
	$dsn="mysql:$hote;port=$port;dbname=$base";

	try
	{
		$dbh = new PDO($dsn, $user, $pass);

	}
	catch (PDOException $e)
	{
		die("Erreur! :" . $e->getMessage());
	}
	return $dbh;
}

function premierepage()
{
	$dbh = Connect();
	$sql =
			"SELECT nom
			from utilisateur";
	$query = $dbh->query($sql);

	if ($query)
	{

		return $query->fetchAll();
	}
	else
	{
		return false;
	}
}

function InsertionNomPrenom($lasnam, $firsnam)
{
	$dbh = connect();
	$sql = "INSERT INTO utilisateur
			 (nom, prenom) VALUES 
			 ('$lasnam', '$firsnam')";
	$insertion = $dbh->exec($sql);
	if ($insertion == false)
	{
		return false;
	}
	else
	{
		return $insertion;
	}
}

function isGoodPasword($pass){
    $dbh = connect();
    $sql = "SELECT pass FROM password";
    echo $sql;
    $query = $dbh->query($sql);
    $goodPass = $query->fetch(PDO::FETCH_ASSOC);
    var_dump($pass); 
    if (trim($pass)==$goodPass['pass']){
        
        return true; 
    }
    return false;  
 }
 
  function insertionDuCulte($titre, $description){
     $dbh = connect();
     $sql = "INSERT INTO culte
			 (titre, description, date, ) VALUES 
			 ('$titre', '$description')";
	$insertion = $dbh->exec($sql);
     
     
     
 }