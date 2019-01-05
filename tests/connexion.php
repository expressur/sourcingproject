<?php
    session_start();

        // Connexion
    try 
    {
        $bdd = new PDO('sqlite:../../../../home/pi/automate/Survbatt.db');
    } 

    catch (SQLiteException $e)
    {
        die("La création ou l'ouverture de la base a échouée ".
        "pour la raison suivante: ".$e->getMessage());
    } 
	if (!empty($_POST)) { // Si tous les input sont remplis
		$errors = array(); // On créer un tableau nommé $errors permettant d'afficher les erreurs si jamais il y en a
		
		if (empty($_POST["u_login"])) $errors['u_login'] = "Identifiant : Aucun identifiant n'a été entré"; // On vérifie si l'identifiant a été entré
		else if (empty($_POST["u_password"]))  $errors['u_password'] = "Mot de passe : Aucun mot de passe n'a été entré"; // On vérifie si le mot de passe a été entré
		else {
			// on vérifie si l'identifiant entré existe bien dans la base de données
			$check_login = $bdd->prepare("SELECT u_login FROM Techniciens WHERE u_login = ? "); // On prépare une requête SQL
			$check_login->execute([$_POST["u_login"]]); // On exécute de la requête
			$checked_login = $check_login->fetch(); // On récupère les données de la requête
			$check_login->closeCursor(); // On ferme la connexion à la base de donnée
			
			if (!$checked_login) $errors["u_login"] = "Identifiant : Cet identifiant est incorrect"; // On affiche un message d'erreur
			else { // Si tout est bon
				$user_login    = $_POST['u_login']; // On met l'identifiant et le mot de passe dans des variables (pour faciliter la suite du code)
				$user_password = $_POST['u_password'];
				
				// On vérifie si le mot de passe correspond à l'identifiant
				$check_password = $bdd->query("SELECT u_password FROM Techniciens WHERE u_login='$user_login' ");
				$checked_password = $check_password->fetch(PDO::FETCH_ASSOC);
				$check_password->closeCursor();
				$hashed_password = $checked_password['u_password'];
				$verify_password = password_verify($user_password, $hashed_password);
				
				// Si le mot de passe est incorrect on affiche un message d'erreur
				if ($verify_password == 0) $errors["u_password"] = "Mot de passe : Le mot de passe est incorrect";	
			}
		}
		
		// S'il n'y a aucune erreur, on connecte l'utilisateur
		if (empty($errors)) {
			$listinfo = $bdd->query("SELECT * FROM Techniciens WHERE u_login = '$user_login'"); // Requête SQL pour récupérer les informations de l'utilisateur
			$userinfo = $listinfo->fetch();
			$listinfo->closeCursor();
			$_SESSION['IDTechnicien'] = $userinfo['IDTechnicien']; // On récupère l'id, le nom, le prénom, le badge, ... de l'utilisateur
			$_SESSION['Prenom'] = $userinfo['Prenom'];
			$_SESSION['Nom'] = $userinfo['Nom'];
			$_SESSION['NumeroDeTelephone'] = $userinfo['NumeroDeTelephone'];
			$_SESSION['u_login'] = $userinfo['u_login'];
			header('Location: ../info.php'); // On redirige l'utilisateur sur la page d'accueil
			exit();
		}
	}
    ?>
<!DOCTYPE html>
<html lang="fr" >
<body>
	
    <form method="post" action="index.php">
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Page de connexion
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Entrez votre nom d'utilisateur">
						<input for='u_login' class="input100" type="text" name="u_login" placeholder="Nom d'utilisateur" >
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Entrez votre mot de passe">
						<input for='u_password' class="input100" type="password" name="u_password" placeholder="Mot de passe" >
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Se Connecter
						</button>
                      
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

    </form></body></html>
