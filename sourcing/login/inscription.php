<?php include '../bdd.php';?>

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
    <link rel="icon" type="image/png" href="images/icons/job.png"/>
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
                    
                    <form action="mail_inscription.php" method="post">  
                        <div class="form-row m-b-55">
                            <div class="name">Identité *</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" required="" value="<?php echo $_POST['PNom_Utilisateur']; ?> " name="PNom_Utilisateur" >
                                            <label class="label--desc">Prénom *</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" required="" type="text" value="<?php echo $_POST['Nom_Utilisateur']; ?> " name="Nom_Utilisateur">
                                            <label class="label--desc">Nom de famille *</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Plus d'informations *</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="email" value="<?php echo $_POST['Mail_Utilisateur']; ?> " required="" id= "Mail_Utilisateur" name="Mail_Utilisateur" >
                                            <label class="label--desc">Email *</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" required="" type="tel" value="<?php echo $_POST['numero']; ?> " name="numero">
                                            <label class="label--desc">Numéro de téléphone*</label>
                                        </div>
                                    </div>
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