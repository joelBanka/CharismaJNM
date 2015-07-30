<?php
include 'db.php';


$titre = $_POST['titre'];
$description = $_POST['desc'];

echo $titre;
echo $description;

    insertionDuCulte($titre, $description);

    header('Location: enregistrement.php');
