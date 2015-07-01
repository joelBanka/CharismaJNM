<?php
 session_start();
 if(isset($_POST) && !empty($_post['exemple'])){
   extract($_post);
   
   $pass=md5($pass);
   //Connection à bd
   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"charisma");
   $sql="SELECT id FROM users WHERE login='$login'AND pass='$pass'";
   
   $req=mysqli_query($link,$sql) or die(mysqli_error());
   if(mysqli_num_rows($req)>0){
   $_SESSION['Auth']=array(
    'login'=>$login,
    'pass'=>$pass
     );
  } else{
    echo"Mauvais identifiants";
   }
 }
?>
<Doctype html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Formulaire_charisma</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext" type="text/css" media="all" />
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>

<!--login modal-->
<div id="loginModal" class="modal show" tabindex="" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Authentification</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="admin.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Nom" name="login">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Mot de passe" name="pass">
            </div>
            <div class="form-group">
              <input class="btn btn-primary btn-lg btn-block" type="submit" value="Enrégistrer"/>
             <!-- <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>-->
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button type="reset" class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>