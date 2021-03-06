<?php
include 'connexion_bdd.php';

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
utilisateur.NomEntreprise_Utilisateur,
Voie_Adresse,
offres.Id_Offre,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type,utilisateur 
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND
utilisateur.Id_Utilisateur = offres.Id_Utilisateur_entreprise
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
utilisateur.NomEntreprise_Utilisateur,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type,utilisateur
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND 
offre_type.Id_OffreT = offres.Id_OffreT
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND
utilisateur.Id_Utilisateur = offres.Id_Utilisateur_entreprise
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
categorie,beneficier,offres
WHERE
offres.Id_Offre = beneficier.Id_Offre
AND
categorie.Id_Categorie = beneficier.Id_Categorie
ORDER BY beneficier.Id_Categorie DESC
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
numéro_utilisateur,
Mail_Utilisateur
FROM
utilisateur,postuler,offres
WHERE
utilisateur.Id_Utilisateur = postuler.Id_Utilisateur
AND
offres.Id_Offre = postuler.Id_Offre
AND
utilisateur.Id_Utilisateur GROUP BY utilisateur.Id_Utilisateur');

$liste_offre = $bdd->prepare('SELECT
Titre_Offre,
Date_Debut_Offre
FROM
offres
WHERE
Id_Utilisateur_entreprise = ?');
$liste_offre->execute(array($id_user));

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
utilisateur.NomEntreprise_Utilisateur,
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
utilisateur.NomEntreprise_Utilisateur,
Voie_Adresse,
offres.Id_Offre,
adresse.Id_Adresse,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type,utilisateur
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND 
offre_type.Id_OffreT = offres.Id_OffreT
AND
utilisateur.Id_Utilisateur = offres.Id_Utilisateur_entreprise
AND
adresse.Id_Adresse in (select adresse.Id_Adresse from adresse WHERE Ville_Adresse =:lieu)
ORDER BY Id_Offre DESC');
$lieu_recherche ->execute(array('lieu' =>$_GET['lieu']));

$categorie_recherche = $bdd->prepare('SELECT 
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
utilisateur.NomEntreprise_Utilisateur,
Voie_Adresse,
offres.Id_Offre,
adresse.Id_Adresse,
Type_OffreT 
FROM
offres,adresse,offre_type,remuneration_type,utilisateur,beneficier,categorie
WHERE offres.Id_Adresse = adresse.Id_Adresse
AND
remuneration_type.Id_Remu_Type = offres.Id_Remu_Type
AND 
offre_type.Id_OffreT = offres.Id_OffreT
AND
utilisateur.Id_Utilisateur = offres.Id_Utilisateur_entreprise
AND
categorie.Id_Categorie = beneficier.Id_Categorie
AND
offres.Id_Offre = beneficier.Id_Offre
AND
categorie.Nom_Categorie =:categorie
ORDER BY Id_Offre DESC');
$categorie_recherche ->execute(array('categorie' =>$_GET['categorie']));

$info_perso = $bdd ->prepare(
"SELECT 
Nom_Utilisateur,
PNom_Utilisateur,
numéro_utilisateur,
Mail_Utilisateur
FROM
utilisateur
WHERE
Id_Utilisateur =?");
$info_perso->execute(array($id_user));
$infoP = $info_perso->fetch();

$info_perso_addresse = $bdd->prepare(
"SELECT 
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
$info_perso_addresse->execute(array($id_user));
$infoA = $info_perso_addresse->fetch();

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

$liste_des_cv = $bdd->query('SELECT
 Id_Cv,
 Titre_Cv
 FROM
 candidat_cv
 WHERE
 Id_Utilisateur ='.$id_user.'
ORDER BY Id_Cv DESC
LIMIT 5');

$liste_des_utilisateurs = $bdd->query('SELECT
Nom_Utilisateur,
PNom_Utilisateur,
Nom_Utilisateur,
numéro_utilisateur,
Utilisateur_Type,
Id_Utilisateur,
Mail_Utilisateur
FROM
utilisateur,type_u
WHERE
type_u.Id_Type = utilisateur.Id_Type
AND
Id_Utilisateur <>'.$id_user);

$liste_des_categorie = $bdd->query('SELECT * FROM categorie');

$liste_des_non_suivi = $bdd->query('SELECT
utilisateur.Id_Utilisateur,
Nom_Utilisateur,
PNom_Utilisateur,
Mail_Utilisateur,
numéro_utilisateur
FROM
utilisateur
LEFT JOIN
suivre
ON
utilisateur.Id_Utilisateur = suivre.Id_Utilisateur_suivre
WHERE
suivre.Id_Utilisateur_suivre IS NULL
AND
utilisateur.Id_Type = 4');

$nombre_nv_candidat =$bdd->query('SELECT
COUNT(*)
FROM
utilisateur
LEFT JOIN
suivre
ON
utilisateur.Id_Utilisateur = suivre.Id_Utilisateur_suivre
WHERE
suivre.Id_Utilisateur_suivre IS NULL
AND
utilisateur.Id_Type = 4');
$nv_candidat = $nombre_nv_candidat->fetch();

$liste_mes_suivi = $bdd->query('SELECT
utilisateur.Id_Utilisateur,
Nom_Utilisateur,
PNom_Utilisateur,
Mail_Utilisateur,
numéro_utilisateur
FROM
utilisateur,suivre
WHERE
utilisateur.Id_Utilisateur = suivre.Id_Utilisateur_suivre
AND
suivre.Id_Utilisateur ='.$id_user);

$liste_pas_mes_suivi = $bdd->query('SELECT
utilisateur.Id_Utilisateur,
Nom_Utilisateur,
PNom_Utilisateur,
Mail_Utilisateur,
numéro_utilisateur
FROM
utilisateur,suivre
WHERE
utilisateur.Id_Utilisateur = suivre.Id_Utilisateur_suivre
AND
suivre.Id_Utilisateur <>'.$id_user);
 ?>
