<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// db configuration
$db_user = 'tmsuser';
$db_pwd = 'ezOwvGoLo6C4fhvO';
$db_name = 'talent_manager';
$db_host = 'localhost';
        
//db_connection
 $bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_user,$db_pwd);
 
 $nombre_offre = $bdd->query('
SELECT 
COUNT(*)
FROM offres');
$nb_offre = $nombre_offre->fetch();

$les_offres = $bdd->query('
SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type_Offre,
Titre_Offre,
Dep_Adresse,
Num_Adresse, 
Ville_Adresse, 
Voie_Adresse,
Id_Offre,
Type_OffreT 
FROM
offres,adresse,offres_type 
WHERE offres.Id_Adresse = adresse.Id_Adresse 
AND 
offres_type.Id_OffreT = offres.Id_OffreT
ORDER BY Id_Offre DESC');

$detail_offre = $bdd->prepare('
SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type_Offre,
Titre_Offre,
Dep_Adresse,
Num_Adresse, 
Ville_Adresse, 
Voie_Adresse,
Type_OffreT 
FROM
offres,adresse,offres_type 
WHERE offres.Id_Adresse = adresse.Id_Adresse 
AND 
offres_type.Id_OffreT = offres.Id_OffreT
AND
Id_Offre =:off');
$detail_offre->execute(array('off' =>$_GET['off']));
$d_offre = $detail_offre ->fetch();

$lieu_offre = $bdd ->query('
SELECT
DISTINCT
Ville_Adresse 
FROM
offres,adresse
WHERE
offres.Id_Adresse = adresse.Id_Adresse');

$lieu = $bdd ->query('SELECT
DISTINCT
Ville_Adresse 
FROM
offres,adresse
WHERE
offres.Id_Adresse = adresse.Id_Adresse');
 ?>