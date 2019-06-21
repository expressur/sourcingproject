<?php
include 'bdd.php';
//var_dump($_POST);
if(!empty($_POST['check']))
{
    $dl_le_cv = $bdd->prepare(
    'SELECT
    Fichier_Cv
    FROM
    candidat_cv
    WHERE
    Id_Cv = ?');
    $dl_le_cv->execute(array($_POST['id_cv']));
    $dl_cv = $dl_le_cv->fetch();
    $url = $dl_cv[Fichier_Cv];
    $remplace = "\\";
    $out = str_replace("/", $remplace, $url);
    $file = $url;
   // echo $file;

    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: Binary');
    header("Content-Type: application/force-download"); 
    header('Content-disposition: attachment; filename="'.basename($file).'"');
    echo readfile($file);
}
 else {
   header('Location: index.php');
}
?>