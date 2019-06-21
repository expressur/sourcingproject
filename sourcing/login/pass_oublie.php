<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Mot de passe oublié</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/job.png"/>
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
                        <p>Si vous ne recevez pas le mot de passe par mail c'est surement que vous vous êtes tromper en l'écrivant.</p></br>
                    </div>

                    <form method="POST"  action="envoie_pass.php" class="login100-form validate-form">
                        <span class="login100-form-title">
                            Mot de passe oublié
                        </span>
                        
                        <div class="wrap-input100 validate-input" data-validate = "adresse email requis par exemple: ex@abc.xyz">
                            <input class="input100" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" name="Mail_Utilisateur" placeholder="EMail">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                               Envoyer un nouveau mot de passe
                            </button>
                        </div>


                        <div class="text-center p-t-136">
                            <a class="txt2" href="../index.php">
                                <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                                Revenir a l'ecran d'accueil
                            </a>
                            
                            </br>
                            <a class="txt2" href="connexion.php">
                                <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                                Revenir a l'ecran de connexion
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