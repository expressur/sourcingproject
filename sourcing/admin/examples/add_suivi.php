<?php
include '../../bdd.php';
//var_dump($_GET);
$date = date('Y-m-d');
$idcandidat = $_GET['idcandidat'];
//echo $date;

$ajout_liste = $bdd->prepare("INSERT INTO suivre (Id_Utilisateur, Id_Utilisateur_suivre, Date_suivi) VALUES ( '".$id_user."', ?, '".$date."') ");
$ajout_liste->execute(array($idcandidat));
header('Location: suivi.php');
?>

