<?php
 session_start();
 // if(isset($_POST) && !empty($_POST['login']) && !empty($_post['pass'])){
 if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])){
 echo 'debut';
   extract($_POST);
    //ctrl+shap +fleche haut et bas, ctrl+d pour dupliquer, ctrl+q pour commenter
    $pass=md5($pass);
   //Connection à bd
   $link=mysqli_connect("localhost","root","");
   
   mysqli_select_db($link,"bdcharisma");
  
   $sql="SELECT id FROM users WHERE login='$login'AND pass='$pass'";

   $req=mysqli_query($link,$sql) ;
  
   //var_dump();

   if(mysqli_num_rows($req)>0){
    
   $_SESSION['Auth']=array(
    'login'=>$login,
    'pass'=>$pass
     );
   header('Location: admin.php');
  } else{
    echo"Mauvais identifiants";
   }
 }
 /* Ferme la connexion */
//mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>formulaire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="jumbotron"><center>
    <h1>CHARISMA</h1>
    <p>Formulaire d'inscription</p> </center>
  </div>
  <div class="row">
   <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <form role="form" action="" method="post">
    <div class="form-group">
      <label for="login">Login:</label>
      <input type="text"name="login" class="form-control" id="login" placeholder="Entrer login">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="pass" class="form-control" id="pwd" placeholder="Entrer password">
    </div>
    <!--<div class="checkbox">
      <label><input type="checkbox"> Rappeler vous de moi</label>
    </div>-->
    <button type="submit" class="btn btn-info">Enrégistrer</button>
  </form>
    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>

</body>
</html>