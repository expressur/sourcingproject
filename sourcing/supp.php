<?php
include 'bdd.php';

$supp = $bdd ->prepare(
'DELETE FROM postuler WHERE Id_Utilisateur=:candidat AND Id_Offre= :off');
$supp->execute(array('candidat'=>$_GET['candidat'],'off'=> $_GET['off']));

header('Location:mes_offres.php');
?>
