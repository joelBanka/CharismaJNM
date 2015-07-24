
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
          <form action="register.php" method="post">
            <div class="form-group">
                <input type="text" name="nom" class="form-control input-lg" placeholder="Nom" required>
            </div><div class="form-group">
                <input type="text" name="prenom" class="form-control input-lg" placeholder="Prenom" required>
            </div>
            <div class="form-group">
                <input type="password" name="mdp" class="form-control input-lg" placeholder="Mot de passe" required>
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
