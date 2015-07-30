<form action="titleControls.php" class="form-horizontal" method="post">
<fieldset

<!-- TITRE DU CULTE -->
<legend>Titre du culte</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="">Titre du culte</label>
  <div class="controls">
    <input id="title" name="titre" placeholder="Entrez le titre ici" class="input-large" type="text">
    <p class="help-block">ex: La puissance de Dieu </p>
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="Desc">Description du culte</label>
  <div class="controls">                     
    <textarea id="Desc" name="desc">Entrez la description ici
</textarea>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="titlevalidBtn"></label>
  <div class="controls">
    <button id="titlevalidBtn" name="validBtn" class="btn btn-primary">Enregistrer</button>
  </div>
</div>

</fieldset>
</form>
