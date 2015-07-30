<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Script culte</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 
  <div class="col-xs-12 col-sm-3 col-md-3"></div>
  <div class="col-xs-12 col-sm-6 col-md-6" style="background-color:lavender;">
  <h2 style="text-align:center;" class="btn-primary">CHARISMA-CHURCH</h2>
 
  <form action="titleControls.php" method="post">
    <div class="form-group">
      <label for="titre">Titre:</label>
      <input type="text" class="form-control" name="titre" placeholder="Entrer le titre">
    </div>
    <div class="form-group">
      <label for="desc">Description:</label>
      <textarea type="text" class="form-control" rows="5" name="desc" placeholder="La description..."></textarea>
    </div>
   <!-- <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>-->
    
    <button type="submit" class="btn btn-success btn-lg btn-block">Soumettre</button>
    
  </form>
  </div>
</div>

</body>
</html>