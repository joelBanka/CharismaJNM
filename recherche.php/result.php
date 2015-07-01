<?php

include_once 'cnx.php';
if(isset($_GET['motclef'])){


    $motclef = $_GET['motclef'];

    $q = array('motclef'=>$motclef. '%');
    $sql = 'SELECT nom,message FROM script WHERE nom like :motclef or message like :motclef';
    $req = $cnx->prepare($sql);
    $req->execute($q);
    //var_dump($req);
    $count = $req->rowCount($sql);

    if($count){
        while ($result = $req->fetch(PDO::FETCH_OBJ)){
            echo " Nom :".$result->nom."<br/>Message:".$result->message."<br/>";
        }
    }else{
         echo "Aucun resultat pour :".$motclef;
    }
}


?>