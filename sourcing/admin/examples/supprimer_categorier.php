<?php
include '../../bdd.php';

$supprimer_lien = $bdd->prepare('
DELETE 
FROM 
beneficier 
WHERE 
Id_Categorie = ?');
$supprimer_lien->execute(array($_GET['cat']));

$supprimer_categorie = $bdd->prepare('
DELETE 
FROM 
categorie 
WHERE 
Id_Categorie = ?');
$supprimer_categorie->execute(array($_GET['cat']));

header('Location: ajout_categorie.php');
?>