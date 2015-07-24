<?php
include 'db.php';


$msg1 ='';
$msg2='';
$msg3='';

$nom='';
$prenom='';
$emptyData= TRUE;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
   if(isset($_POST['nom']) && trim($_POST['nom'])=="")
    {
        $emptyData = TRUE;
        $msg1 = "Le Champ Nom doit être rempli";      
    }
    else {
        $emptyData = FALSE;      
    }
    
    if(isset($_POST['prenom']) && trim($_POST['prenom']) == "")
    {
        $emptyData = TRUE;
        $errPrenom = 'Entrez un nom';
        $msg2 = "Le Champ Prenom doit être rempli";  
    }
    else {
        $emptyData = FALSE;   
    }

    if(isset ($_POST['mdp']) && trim($_POST['mdp'])== "")
    {
        $emptyData = TRUE;  
        $msg3 = "Entrer le mot de pass";
    }
    else {
        $emptyData = FALSE;    
    }
} 

if (!$emptyData && isGoodPasword($_POST["mdp"]))
       //isset($_POST["nom"]) && ($_POST["prenom"]
{
  $entrer = InsertionNomPrenom($_POST['nom'], $_POST['prenom']);
    header('Location: title.php');  
}
else {
    echo "insertion echoue";
}
?>