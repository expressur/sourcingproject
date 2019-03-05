<?php
//ini_set("display_errors",0);error_reporting(0);
//ini_set('display_errors', 1);
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

$requete_offres = '
SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type,
Titre_Offre,
Dep_Adresse,
Num_Adresse, 
Ville_Adresse, 
Voie_Adresse,
offres.Id_Offre,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type 
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND 
offre_type.Id_OffreT = offres.Id_OffreT
ORDER BY Id_Offre DESC';

/*$les_offres = $bdd->query('
SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type,
Titre_Offre,
Dep_Adresse,
Num_Adresse, 
Ville_Adresse, 
Voie_Adresse,
offres.Id_Offre,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type 
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND 
offre_type.Id_OffreT = offres.Id_OffreT
ORDER BY Id_Offre DESC LIMIT 1');

//liste des offres sans limite
$r_offres = $bdd->query('
SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type,
Titre_Offre,
Dep_Adresse,
Num_Adresse, 
Ville_Adresse, 
Voie_Adresse,
offres.Id_Offre,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type 
WHERE offres.Id_Offre = adresse.Id_Offre
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND 
offre_type.Id_OffreT = offres.Id_OffreT
ORDER BY Id_Offre DESC');*/

$detail_offre = $bdd->prepare('
SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type,
Titre_Offre,
Dep_Adresse,
Num_Adresse, 
Ville_Adresse, 
Voie_Adresse,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND 
offre_type.Id_OffreT = offres.Id_OffreT
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND
offres.Id_Offre =:off');
$detail_offre->execute(array('off' =>$_GET['off']));
$d_offre = $detail_offre ->fetch();

$lieu_offre = $bdd ->query('
SELECT
DISTINCT
Ville_Adresse 
FROM
offres,adresse
WHERE
offres.Id_Adresse = adresse.Id_Adresse
LIMIT 5');

$lieu = $bdd ->query('
SELECT
DISTINCT
Ville_Adresse
FROM
offres,adresse
WHERE
offres.Id_Adresse = adresse.Id_Adresse
');

$type_utilisateur = $bdd ->query(
'SELECT * 
FROM 
type_u 
WHERE
Id_Type <> "1" ');

$mes_offres = $bdd ->prepare(
'SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type,
Titre_Offre,
Dep_Adresse,
Num_Adresse, 
Ville_Adresse, 
Voie_Adresse,
offres.Id_Offre,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type,postuler,utilisateur
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND 
offre_type.Id_OffreT = offres.Id_OffreT
AND
postuler.Id_Utilisateur = utilisateur.Id_Utilisateur
AND
postuler.Id_Offre = offres.Id_Offre
AND
utilisateur.Id_Utilisateur =:candidat');
$mes_offres->execute(array('candidat' =>$_GET['candidat']));

$lieu_recherche = $bdd ->prepare('
SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type,
Titre_Offre,
Dep_Adresse,
Num_Adresse, 
Ville_Adresse, 
Voie_Adresse,
offres.Id_Offre,
adresse.Id_Adresse,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type 
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND 
offre_type.Id_OffreT = offres.Id_OffreT
AND
adresse.Id_Adresse in (select adresse.Id_Adresse from adresse WHERE Ville_Adresse =:lieu)
ORDER BY Id_Offre DESC');
$lieu_recherche ->execute(array('lieu' =>$_GET['lieu']));

//toutes les offres par ville
//select * from offres where Id_Offre in (select Id_Offre from adresse WHERE Ville_Adresse = 'Vaux le penil')


session_start();
 ?>