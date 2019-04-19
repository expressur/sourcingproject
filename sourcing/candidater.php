<?php
include 'bdd.php';
if(empty($_SESSION['Id_Utilisateur']))
{
    header('Location:login/connexion.php');
}
else
{
    $error = false;

    $check_postuler = $bdd->prepare('SELECT * FROM postuler WHERE Id_Utilisateur=? AND Id_Offre = ?');
    $check_postuler->execute(array($_GET['candidat'], $_GET['off']));
    $candidater = $check_postuler->fetch();

    /*if ($candidater)
    {
        if ($error == false)
            {
                $error = true;
                header('Location:login/connexion.php');
            }
    }*/


    $postuler = $bdd ->prepare(
    'INSERT INTO
    postuler 
    (Id_Utilisateur,Id_Offre)
    VALUES (?,?)');
    $postuler->execute(array($_GET['candidat'], $_GET['off']));

    header('Location:index.php#ancre_postuler');
}
?>
