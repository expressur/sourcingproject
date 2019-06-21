<?php
session_start();

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
                $format_nom = 'Offre_de_'.$_SESSION['Nom_entreprise'].'_'. md5(uniqid(rand(), true));
                $extension= substr(strrchr($_FILES['doc']['name'], "."),1);
                $nom = $format_nom.'.'.$extension;
                $chemin_def = 'upload_offre/'.$nom;
                $move = move_uploaded_file($chemin_temp, $chemin_def);
                 header('Location:envoie_offre.php');
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
