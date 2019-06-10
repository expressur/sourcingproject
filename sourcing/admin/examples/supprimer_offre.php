<?php
include '../../bdd.php';

$categorie_offre = $bdd->prepare(
'SELECT
 Id_offre,
 Id_Categorie
 FROM beneficier
WHERE
Id_offre = ?');
$categorie_offre->execute(array($_GET['off']));
while($supprimer_categorie = $categorie_offre->fetch())
{
    $delet_categorie ="
    DELETE
    FROM    
    beneficier
    WHERE
    Id_offre =".$supprimer_categorie[Id_offre]."
    AND 
    Id_Categorie =".$supprimer_categorie[Id_Categorie];          
    $bdd->exec($delet_categorie);
    
}
$postuler_offre = $bdd->prepare('SELECT
 Id_offre,
 Id_Utilisateur
 FROM postuler
WHERE
Id_offre = ?');
$postuler_offre->execute(array($_GET['off']));
while($supprimer_postuler = $postuler_offre->fetch())
{
    $delet_postuler ="DELETE
    FROM    
    postuler
    WHERE
    Id_offre =".$supprimer_postuler[Id_offre]."
    AND 
    Id_Utilisateur =".$supprimer_postuler[Id_Utilisateur];          
    $bdd->exec($delet_postuler);
}

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


header('Location: tables.php');