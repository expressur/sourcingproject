<?php
include '../../bdd.php';

$id_addresse_offre = $bdd->prepare(
'SELECT
Id_Adresse
FROM
offres
WHERE
Id_Offre = ?');
$id_addresse_offre->execute(array($_GET['off']));
$addresse_offre = $id_addresse_offre->fetch();
$id_addresse = $addresse_offre[Id_Adresse];
echo "L'ID de l'adresse est : ".$id_addresse;

$supprimmer_offre = $bdd->prepare('
DELETE 
FROM 
offres 
WHERE 
Id_Offre  =?');
$supprimmer_offre->execute(array($_GET['off']));

$supprimer_addresse = $bdd->exec('
DELETE 
FROM 
adresse
WHERE 
Id_Adresse ='.$id_addresse);



//header('Location:index.php#ancre_postuler');