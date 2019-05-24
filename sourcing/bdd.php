<?php
session_start();
ini_set("display_errors",0);error_reporting(0);
ini_set('display_errors', 1);
$id_user = $_SESSION['Id_Utilisateur'];
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

$requete_candidat_postuler ='
SELECT Id_Offre FROM postuler WHERE Id_Utilisateur =';

$nombre_candidat = $bdd->query('
SELECT 
COUNT(*)
FROM utilisateur
WHERE
Id_Type = 4');
$nb_candidat = $nombre_candidat->fetch();

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



$detail_offre = $bdd->prepare('
SELECT 
Petite_Description_Offre,
Description_Offre,
Date_Debut_Offre,
Date_Fin_Offre,
Remuneration_Offre,
Remuneration_Type,
Id_Offre,
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
ORDER BY Id_Offre DESC
LIMIT 8');

$categorie = $bdd ->query(
'SELECT 
DISTINCT
Nom_Categorie
FROM
categorie
ORDER BY Id_Categorie DESC
LIMIT 8');

$categorie_info_offre = $bdd ->prepare(
'SELECT 
Nom_Categorie
FROM
offres,categorie,beneficier
WHERE
beneficier.Id_Offre = offres.Id_Offre
AND
beneficier.Id_Categorie = categorie.Id_Categorie
AND
offres.Id_Offre =:categorie');
$categorie_info_offre->execute(array('categorie' =>$_GET['categorie']));

//Requete pour trouver les categories pour une offre donnee
$requet_categorie_offre = 'SELECT 
*
FROM
categorie
WHERE
Id_Categorie IN
(SELECT Id_Categorie FROM beneficier
 WHERE
 Id_Offre =';


$type_utilisateur = $bdd ->query(
'SELECT * 
FROM 
type_u 
WHERE
Id_Type <> "1"
AND
Id_Type <> "4" ');

$nom_entreprise = $bdd ->query(
'SELECT
Id_Utilisateur,
NomEntreprise_Utilisateur
FROM
utilisateur
WHERE
NomEntreprise_Utilisateur IS NOT NULL
AND 
Id_Type = 3');

$offre_type = $bdd ->query(
'SELECT *
FROM
offre_type');

$type_remu = $bdd ->query(
'SELECT *
FROM
remuneration_type
');

$liste_candidature = $bdd ->query(
'SELECT
DISTINCT
COUNT(*) AS nombre,
Nom_Utilisateur,
PNom_Utilisateur,
utilisateur.Id_Utilisateur,
Mail_Utilisateur
FROM
utilisateur,postuler,offres
WHERE
utilisateur.Id_Utilisateur = postuler.Id_Utilisateur
AND
offres.Id_Offre = postuler.Id_Offre
AND
utilisateur.Id_Utilisateur GROUP BY utilisateur.Id_Utilisateur');

$modal_liste_offre = $bdd ->prepare(
'SELECT
Titre_Offre,
Date_Debut_Offre,
offres.Id_Offre
FROM
postuler,offres,utilisateur
WHERE
postuler.Id_Utilisateur = utilisateur.Id_Utilisateur
AND
postuler.Id_Offre = offres.Id_Offre
AND
postuler.Id_Utilisateur = :modal
ORDER BY Id_Offre DESC');
$modal_liste_offre->execute(array('modal' =>$_GET['modal']));

$modal_candidat = $bdd ->prepare(
'SELECT
Nom_Utilisateur,
PNom_Utilisateur,
offres.Id_Offre
FROM
postuler,offres,utilisateur
WHERE
postuler.Id_Utilisateur = utilisateur.Id_Utilisateur
AND
postuler.Id_Offre = offres.Id_Offre
AND
postuler.Id_Utilisateur = :idcandidat');
$modal_candidat->execute(array('idcandidat' =>$_GET['idcandidat']));
$modal_liste_candidat = $modal_candidat ->fetch();

$liste_entreprise = $bdd ->query(
'SELECT 
Nom_Utilisateur,
PNom_Utilisateur,
NomEntreprise_Utilisateur,
Mail_Utilisateur
FROM
utilisateur
WHERE
Id_Type = 3');

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
    utilisateur.Id_Utilisateur =?');

$mes_offres->execute(array($id_user));

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

$info_perso = $bdd ->prepare(
"SELECT 
Nom_Utilisateur,
PNom_Utilisateur,
Mail_Utilisateur,
Num_Adresse,
Voie_Adresse,
Dep_Adresse,
Ville_Adresse
FROM
utilisateur,adresse
WHERE
utilisateur.Id_Adresse = adresse.Id_Adresse
AND
Id_Utilisateur =?");
$info_perso->execute(array($id_user));
$infoP = $info_perso->fetch();

$barre_recherche = $bdd->prepare(
'SELECT * 
FROM 
offres 
WHERE
Titre_Offre LIKE %:recherche%');
$barre_recherche ->execute(array('recherche' =>$_GET['recherche']));
$recherche = $barre_recherche->fetch();

$recherche_categorie = $bdd ->query(
'SELECT 
Nom_Categorie
FROM
categorie
LIMIT 5');

$ajout_catégorie = $bdd->query(
'SELECT * 
FROM 
categorie');

$ajout_catégorie2 = $bdd->query(
'SELECT * 
FROM 
categorie');

$liste_supprimer_offre = $bdd->query(
'SELECT
 Id_Offre,
 Titre_Offre
 FROM
 offres');


 ?>