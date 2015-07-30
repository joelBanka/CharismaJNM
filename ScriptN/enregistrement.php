<!DOCTYPE html>
<html lang="en">
<head>
  <title>Enregistrement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
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
          <input class="form-control" placeholder="Search" type="text">
        </div>
        <button type="submit" class="btn btn-danger">Rechercher</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.html">Deconnection</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--<div class="col-sm-4">
 <img src="clocks.png" class="img-rounded" alt="clocks" width="350" height="236"> 
</div>-->

<form class="col-sm-6">

<div class="header">
	 <br>  <button type="button" class="btn btn-info btn-lg btn-block">
	 <h1>SCRIPT CULTE </h1>
	 </button> 
	 </br>

		<div class="clock">
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
		<div class="message"></div>
	</div>
	
	<div class="container">
<br> <label> Auteur de l'action</label> </br>
    <label class="checkbox-inline">
      <input type="checkbox" value=""> PASTEUR PEDRO
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value=""> INVITE
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value=""> AUTRE 
    </label> 
</div> 
<br> </br>
	<div>
 <label> Nom de l'action</label>
  <input class="form-control">
   <p class="help-block"></p>
    </div>
	
<div class="form-group">
 <label for="comment">Informations complémentaires</label>
 <textarea class="form-control" rows="5" id="comment"></textarea>
  </div>
        
        <br> <label> Action retrospective </label> </br>
    <label class="checkbox-inline">
      <input type="checkbox" value=""> RETOSPECTIVE
    </label>
	
<br></br>
	
	
<div>
  <button type="submit" class="btn btn-danger">Ajouter</button>
  </div>
</form>

 <div class="col-sm-6">
 <img src="Affichage des actions.png" class="img-rounded" alt="Affichage des actions" width="350" height="236"> 
</div>
 
</div>
</body>
</html>
