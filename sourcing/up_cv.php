<?php
include 'bdd.php';

if(!empty($_FILES['doc']['tmp_name'])){
    if(is_uploaded_file($_FILES['doc']['tmp_name'])){
        
        $typeMime = mime_content_type($_FILES['doc']['tmp_name']);
        
        if($typeMime == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $typeMime == 'application/msword')
        {
            $size = filesize($_FILES['doc']['tmp_name']);
            if($size > 3000000)
            {
                echo'Le fichier est trop gros';
            }
            else{
                $chemin_temp = $_FILES['doc']['tmp_name'];
                $format_nom = 'CV_de_'.$_SESSION['PNom_Utilisateur'].'_'.$_SESSION['Nom_Utilisateur'].'_'. md5(uniqid(rand(), true));
                $extension= substr(strrchr($_FILES['doc']['name'], "."),1);
                $nom = $format_nom.'.'.$extension;
                $chemin_def = 'cv/'.$nom;
                $move = move_uploaded_file($chemin_temp, $chemin_def);
                $up_cv = $bdd->prepare('INSERT INTO candidat_cv (Fichier_Cv, Titre_Cv, 	Id_Utilisateur) VALUES ( ? , ? , ? )');
                $up_cv->execute(array($chemin_def, $_POST['titre_cv'], $_SESSION['Id_Utilisateur']));
               
                 header('Location:cv.php');
            }
            
        }else{
            echo'Ce n\' est pas un fichier autoriser !';
        }
        
    }else
        echo 'Il y a un pb lors de l\' upload';
    
}
else{
    echo'Aucun fichier à télécharger';
}
?>