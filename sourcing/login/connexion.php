<?php

// Connexion
include '../bdd.php';
if (!empty($_POST)) { // Si tous les input sont remplis
    $errors = array(); // On créer un tableau nommé $errors permettant d'afficher les erreurs si jamais il y en a

    if (empty($_POST["Mail_Utilisateur"]))
        $errors['Mail_Utilisateur'] = "Identifiant : Aucun identifiant n'a été entré"; // On vérifie si l'identifiant a été entré
    else if (empty($_POST["Mdp_Utilisateur"]))
        $errors['Mdp_Utilisateur'] = "Mot de passe : Aucun mot de passe n'a été entré"; // On vérifie si le mot de passe a été entré
    else {
        // on vérifie si l'identifiant entré existe bien dans la base de données
        $check_login = $bdd->prepare("SELECT Mail_Utilisateur FROM utilisateur WHERE Mail_Utilisateur = ? "); // On prépare une requête SQL
        $check_login->execute([$_POST["Mail_Utilisateur"]]); // On exécute de la requête
        $checked_login = $check_login->fetch(); // On récupère les données de la requête
        $check_login->closeCursor(); // On ferme la connexion à la base de donnée

        if (!$checked_login)
            $errors["Mail_Utilisateur"] = "Identifiant : Cet identifiant est incorrect"; // On affiche un message d'erreur
        else { // Si tout est bon
            $user_login = $_POST['Mail_Utilisateur']; // On met l'identifiant et le mot de passe dans des variables (pour faciliter la suite du code)
            $user_password = $_POST['Mdp_Utilisateur'];

            // On vérifie si le mot de passe correspond à l'identifiant
            $check_password = $bdd->query("SELECT Mdp_Utilisateur FROM utilisateur WHERE Mail_Utilisateur='$user_login' ");
            $checked_password = $check_password->fetch(PDO::FETCH_ASSOC);
            $check_password->closeCursor();
            $hashed_password = $checked_password['Mdp_Utilisateur'];
            $verify_password = password_verify($user_password, $hashed_password);

            // Si le mot de passe est incorrect on affiche un message d'erreur
            if ($verify_password == 0)
                $errors["Mdp_Utilisateur"] = "Mot de passe : Le mot de passe est incorrect";
        }
    }
    //echo $user_login;
    // S'il n'y a aucune erreur, on connecte l'utilisateur
    if (empty($errors)) {
        $listinfo = $bdd->query("SELECT * FROM utilisateur WHERE Mail_Utilisateur = '$user_login'"); // Requête SQL pour récupérer les informations de l'utilisateur
        $userinfo = $listinfo->fetch();
        $listinfo->closeCursor();
        $_SESSION['Id_Utilisateur'] = $userinfo['Id_Utilisateur']; // On récupère l'id, le nom, le prénom, le badge, ... de l'utilisateur
        $_SESSION['PNom_Utilisateur'] = $userinfo['PNom_Utilisateur'];
        $_SESSION['Nom_Utilisateur'] = $userinfo['Nom_Utilisateur'];
        $_SESSION['Nom_entreprise'] = $userinfo['NomEntreprise_Utilisateur'];
        $_SESSION['Id_Type'] = $userinfo['Id_Type'];
        $_SESSION['Mail_Utilisateur'] = $userinfo['Mail_Utilisateur'];
        header('Location: redirection.php'); // On redirige l'utilisateur sur la page d'accueil
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Se connecter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="images/img-01.png" alt="IMG">
                    </div>

                    <form method="POST" class="login100-form validate-form">
                        <span class="login100-form-title">
                            Se connecter
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "adresse email requis par exemple: ex@abc.xyz">
                            <input class="input100" value="<?php echo $_POST['Mail_Utilisateur'];?>" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" name="Mail_Utilisateur" placeholder="EMail">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Mot de passe requis">
                            <input class="input100" type="password" name="Mdp_Utilisateur" placeholder="Mot de passe">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                CONNEXION
                            </button>
                        </div>

                        <div class="text-center p-t-12">

                            <a class="txt2" href="#">
                                Mot de pass oublié ?
                            </a>
                        </div>

                        <div class="text-center p-t-136">
                            <a class="txt2" href="../index.php">
                                <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                                Revenir a l'ecran d'accueil
                            </a>
                            
                            </br>
                            
                            <a class="txt2" href="inscription.php">
                                Créer un compte
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>
</html>