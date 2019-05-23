<?php
// db configuration
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
                    $req = $bdd->prepare("INSERT INTO utilisateur (Nom_Utilisateur, PNom_Utilisateur, Mdp_Utilisateur, Mail_Utilisateur, Id_Type, Id_Adresse) VALUES ( ? , ? , ? , ? , 4, ?)");
                    $req->execute(array($_POST['Nom_Utilisateur'], $_POST['PNom_Utilisateur'], $u_password, $_POST['Mail_Utilisateur'], $id));
                    sleep(1);
                    header('Location:connexion.php');
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>S'enregister</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/ins.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/ins.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <a href="../index.php" class="button button1">Retour a l'écran d'accueil</a>
            <div class="card card-5">
                
                <div class="card-heading">
                    
                    <h2 class="title">Formulaire d'inscription</h2>
                </div>
                <div class="card-body">
                    
                    <form method="post">  
                        <div class="form-row m-b-55">
                            <div class="name">Identité *</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" required="" name="PNom_Utilisateur" >
                                            <label class="label--desc">Prénom *</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" required="" type="text"  name="Nom_Utilisateur">
                                            <label class="label--desc">Nom de famille *</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Mail *</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" value="<?php echo $_POST['Mail_Utilisateur']; ?> " required="" id= "Mail_Utilisateur" name="Mail_Utilisateur">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Mot de passe *</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="password" required="" name="Mdp_Utilisateur" >
                                            <label class="label--desc">Insérer le mot de passe *</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" required="" type="password"  name="Mdp_2">
                                            <label class="label--desc">Confirmer le mot de passe *</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <center><h3>Adresse</h3></center></br>
                        <div class="form-row m-b-55">
                            
                             <div class="name"></div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text"  value="<?php echo $_POST['Num_Adresse']; ?>" name="Num_Adresse" id="Num_Adresse">
                                            <label class="label--desc">Numéro</label>
                                        </div>
                                        
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $_POST['Voie_Adresse']; ?>" id="Voie_Adresse" name="Voie_Adresse">
                                            <label class="label--desc">Voie</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name"></div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" value="<?php echo $_POST['Dep_Adresse']; ?>" type="text" name="Dep_Adresse" id="Dep_Adresse">
                                            <label class="label--desc">Departement</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $_POST['Ville_Adresse']; ?>" id="Ville_Adresse" name="Ville_Adresse">
                                            <label class="label--desc">Ville</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <center><div>
                            <button class="btn btn--radius-2 btn--red" type="submit">S'INSCRIRE</button>
                            
                        </div>
                       <p> </br>Vous êtes obliger de remplir les champs où il y a l'astérisque (*). <p></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/ins.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->