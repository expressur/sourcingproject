<?php
include '../../bdd.php';
$dl_le_cv = $bdd->prepare(
'SELECT
Fichier_Cv
FROM candidat_cv 
WHERE
Id_Utilisateur = :id_user
ORDER BY Id_Cv
DESC LIMIT 1');
$dl_le_cv->execute(array('id_user' =>$_GET['id_user']));
$dl_cv = $dl_le_cv->fetch();

$nbr= $dl_le_cv->rowCount();
if($nbr == 0){
    echo 'Pas de CV!';
}else{

$url = $dl_cv[Fichier_Cv];
$remplace = "\\";
$out = str_replace("/", $remplace, $url);
$file = "../../".$out;

header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: Binary');
header('Content-disposition: attachment; filename="'.basename($file).'"');
echo readfile($file);
}