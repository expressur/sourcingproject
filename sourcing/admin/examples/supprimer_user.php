<?php
include '../../bdd.php';

$postuler_offre = $bdd->prepare('SELECT
 Id_offre,
 Id_Utilisateur
 FROM postuler
WHERE
Id_Utilisateur = ?');
$postuler_offre->execute(array($_GET['user']));
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

$id_addresse_user = $bdd->prepare(
'SELECT
Id_Adresse
FROM
utilisateur
WHERE
Id_Utilisateur = ?');
$id_addresse_user->execute(array($_GET['user']));
$addresse_user = $id_addresse_user->fetch();
$id_addresse = $addresse_user[Id_Adresse];

$supprimer_cv = $bdd->prepare('
DELETE 
FROM 
candidat_cv 
WHERE 
Id_Utilisateur  =?');
$supprimer_cv->execute(array($_GET['user']));

$supprimmer_user = $bdd->prepare('
DELETE 
FROM 
utilisateur 
WHERE 
Id_Utilisateur  =?');
$supprimmer_user->execute(array($_GET['user']));

$supprimer_addresse = $bdd->exec('
DELETE 
FROM 
adresse
WHERE 
Id_Adresse ='.$id_addresse);

header('Location: user.php');
?>