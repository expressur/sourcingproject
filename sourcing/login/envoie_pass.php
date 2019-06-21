<?php
include '../bdd.php';
var_dump($_POST);
$mail = $_POST[Mail_Utilisateur];
echo $mail;

$verif_mail = $bdd->prepare('SELECT * FROM utilisateur WHERE Mail_Utilisateur =?');
$verif_mail->execute(array($mail));
$check_mail = $verif_mail->fetch();

if(isset($check_mail['Mail_Utilisateur']))
{
    $new_pass = uniqid();
    
    $new_hash = password_hash($new_pass, PASSWORD_DEFAULT);
    
    $req = $bdd->prepare('UPDATE utilisateur SET Mdp_Utilisateur =? WHERE Mail_Utilisateur =?');
    $req->execute(array($new_hash,$mail));
    
//********************************************************************************************
//                                        ENVOIE DE MAIL                                     *
//********************************************************************************************
    
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour ".$check_mail['PNom_Utilisateur'].",".$passage_ligne.$passage_ligne.
        "Voici votre nouveau mot de passe : ".$new_pass;
        
//$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Nouveau mot de passe.";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: 'Expreessur-job.fr'<info@expressur.com>".$passage_ligne;
$header.= "Reply-to:".$mail.$passage_ligne;
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
    
header('Location: connexion.php?up=1');
}
else
   header('Location: connexion.php?up=1');
?>

