<?php
include '../bdd.php';	
if(!empty($_POST)){
		$error = false;
		
		// NOM
		if(empty($_POST["Nom_Utilisateur"])) {
			echo "Nom : Aucun nom n'a été entré";
			$error = true;
		}
		
		// PRENOM
		if(empty($_POST["PNom_Utilisateur"])) {
			if ($error == false) {
				echo "Prénom : Aucun prénom n'a été entré";
				$error = true;
			}
		}
		// IDENTIFIANT
		if(empty($_POST["Mail_Utilisateur"])) {
			if ($error == false) {
				echo "Identifiant : Aucun identifiant n'a été entré";
				$error = true;
			}
		}else {
			$check_u_login = $bdd->prepare("SELECT Id_Utilisateur FROM utilisateur WHERE Mail_Utilisateur = ?");
			$check_u_login->execute([$_POST["Mail_Utilisateur"]]);
			$u_login = $check_u_login->fetch();
			if($u_login) {
				if ($error == false) {
					echo "Identifiant : Cet identifiant est déjà utilisé";
					$error = true;
				}
			}
		}
		
		// PASSWORD
		if(empty($_POST["Mdp_Utilisateur"])){
			if ($error == false) {
				echo "Mot de passe : Aucun mot de passe n'a été rentré";
				$error = true;
			}
		} elseif($_POST["Mdp_Utilisateur"] == $_POST["Mdp_2"]) {
			$u_password = password_hash($_POST["Mdp_Utilisateur"], PASSWORD_DEFAULT);
		}
                else {
                    echo "Mot de passe :Les mots de passe ne corresponde pas";
				$error = true;
                }
		// INSCRIPTION
		if($error == false)
                {
                    if(empty($_POST["Dep_Adresse"] && $_POST["Ville_Adresse"] && $_POST["Voie_Adresse"] && $_POST["Num_Adresse"] )) {
                        $id = NULL;
                    } else {
 
                    $insc = $bdd->prepare("INSERT INTO adresse (Num_Adresse, Voie_Adresse, Dep_Adresse, Ville_Adresse) VALUES (? , ? , ? , ? )");
                    $insc->execute(array($_POST['Num_Adresse'], $_POST['Voie_Adresse'], $_POST['Dep_Adresse'], $_POST['Ville_Adresse']));
                        
                    $id = $bdd->lastInsertId();
                    
                    }
                    sleep(1);
                    $req = $bdd->prepare("INSERT INTO utilisateur (Nom_Utilisateur, PNom_Utilisateur, Mdp_Utilisateur, Mail_Utilisateur,numéro_utilisateur, Id_Type, Id_Adresse) VALUES ( ? , ? , ? , ? , ? , 4, ?)");
                    $req->execute(array($_POST['Nom_Utilisateur'], $_POST['PNom_Utilisateur'], $u_password, $_POST['Mail_Utilisateur'],$_POST['numero'], $id));
                    sleep(1);
                    header('Location:connexion.php');
		}
	}
//********************************************************************************************
//                                        ENVOIE DE MAIL                                     *
//********************************************************************************************
$mail = 'bak77200@gmail.com'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour,".$passage_ligne.$passage_ligne."il y a un nouveau candidat qui se nome  ".$_POST['Nom_Utilisateur']." ".$_POST['PNom_Utilisateur']."."
        .$passage_ligne.$passage_ligne. "Voici son mail : ".$_POST['Mail_Utilisateur'].$passage_ligne.$passage_ligne.
        "Voici son numéro de téléphone : ".$_POST['numero'];
        
//$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Un candidat viens de s'inscrire.";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: 'Expreessur-job.fr'<info@expressur.com>".$passage_ligne;
$header.= "Reply-to: <info@expressur.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
/*$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;*/
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message_txt,$header);
//==========
header('Location:connexion.php?up=1');
?>

