<?php
include 'db.php';
?>
<html>
 <html>
  <head>
   <meta charset="utf-8"/>
  <body>
   <table border="1">
   <?php
    $afficher = premierepage();
    foreach ($afficher as $mediatheque)
    {
		echo "<tr><td>";
		
		echo "</td><td>";
		echo "<tr><td>".$mediatheque['nom'];
		echo "</td><td>";
		
    
    }
    ?>
    </table>