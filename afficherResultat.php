<?php
// Affichage partiel du résultat d'une requête
// Création d'un tableau HTML, avec autant de colonnes que d'attributs.
// On affiche $pNbLignes lignes, à prtir de la ligne indiquée par $pPosition,
function afficherResultat ($pResultat, $pPosition, $pNbLignes){
  echo "<table border='1'>";
  $compteurLignes = 1;
  $nbAttributs = mysql_num_fields($pResultat);
  while ($tableAttributs = mysql_fetch_row($pResultat)) {
    // Avant la première ligne
	// on affiche l'en-tête du tablea HTML avec le nom des attributs
    if ($compteurLignes == 1) {
      echo "<tr>";
      // Affichage des noms d'attributs
      for ($i=0; $i < $nbAttributs; $i++)
      echo "<th>" .  mysql_field_name ($pResultat, $i) . "</th>\n";
    }
    // Pour chaque ligne comprise entre le première ($pPosition) et la dernière ($pPosition + $pNbLignes -1)
	// on affiche les valeurs de chaque attributs
    if ($compteurLignes >= $pPosition 
    and $compteurLignes <= $pPosition + $pNbLignes -1) {
      echo "<tr>";
      for ($i=0; $i < $nbAttributs; $i++) {
		// si le champ est vide
        if (empty($tableAttributs[$i])) $tableAttributs[$i] = "";
        echo "<td>" . $tableAttributs[$i] . "</td>";
      }
      echo "</tr>\n";
    }
	// incrémente le compteur
	$compteurLignes++;
    // Inutile de continuer si tout est affiché
    if ($compteurLignes >= $pPosition + $pNbLignes - 1) break;
  }
  echo "</table>\n";
}
?>