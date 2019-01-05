<?php
    include('co_Survbatt.php');
    session_start();
    if( $_SESSION['Prenom']== NULL)
    {
         header('Location:co/index.php');
    }
    // ATTENTION LES COOKIES NE SONT A FAIRE !!! 
?>
<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>Nouveau Technicien</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>
<?php
	if(!empty($_POST)){
		$error = false;
		
		// NOM
		if(empty($_POST["Nom"])) {
			echo "Nom : Aucun nom n'a été entré";
			$error = true;
		}
		
		// PRENOM
		if(empty($_POST["Prenom"])) {
			if ($error == false) {
				echo "Prénom : Aucun prénom n'a été entré";
				$error = true;
			}
		}
		
		
		// TELEPHONE
		if(empty($_POST["NumeroDeTelephone"])) {
			if ($error == false) {
				echo "Téléphone : Aucun numéro de téléphone n'a été entré";
				$error = true;
			}
		}
		
		// IDENTIFIANT
		if(empty($_POST["u_login"])) {
			if ($error == false) {
				echo "Identifiant : Aucun identifiant n'a été entré";
				$error = true;
			}
		}else {
			$check_u_login = $bdd->prepare("SELECT IDTechnicien FROM Techniciens WHERE u_login = ?");
			$check_u_login->execute([$_POST["u_login"]]);
			$u_login = $check_u_login->fetch();
			if($u_login) {
				if ($error == false) {
					echo "Identifiant : Cet identifiant est déjà utilisé";
					$error = true;
				}
			}
		}
		
		// PASSWORD
		if(empty($_POST["u_password"])){
			if ($error == false) {
				echo "Mot de passe : Aucun mot de passe n'a été rentré";
				$error = true;
			}
		} else {
			$u_password = password_hash($_POST["u_password"], PASSWORD_DEFAULT);
		}

		// INSCRIPTION
		if($error == false){
			$req = $bdd->prepare("INSERT INTO Techniciens (Nom, Prenom, NumeroDeTelephone, u_password, u_login) VALUES ( ? , ? , ? , ? , ? )");
            $req->execute(array($_POST['Nom'], $_POST['Prenom'], $_POST['NumeroDeTelephone'], $u_password, $_POST['u_login']));
            sleep(1);
            header('Location:enregistrer.php');
		}
	}
?>

    <body>
      <form method="post">
      
        <h1>Enregistrer un nouveau technicien</h1>
        
        <fieldset>
          <label for="name">Nom</label>
          <input type="text" id="Nom" name="Nom">
          
          <label for="mail">Prénom</label>
          <input type="text" id="Prenom" name="Prenom">
            
             <label for="password">Nom d'utilisateur</label>
          <input type="text" id="u_login" name="u_login">
             <label for="password">Numéro de téléphone <br>(Ne pas mettre de point)</label>
          <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="NumeroDeTelephone" name="NumeroDeTelephone">
            
          <label for="password">Mot de passe</label>
          <input type="password" id="u_password" name="u_password">
          
        </fieldset>
        
        <button type="submit">Envoyer</button>
      </form>
    </body>
</html>