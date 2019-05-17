        <?php include 'bdd.php';?>

<!DOCTYPE html>
<html lang="fr" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/job.png">
        <!-- Author Meta -->
        <meta name="author" content="codepixer">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Job Expressur</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/nice-select.css">					
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <header id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a id="monBouton" ><img src="img/job.png" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="index.php">Accueil</a></li>
                            <!-- <li><a href="about-us.php">A propos de nous</a></li> -->
                            <li><a href="https://expressur.fr/">Site vitrine</a></li>
                            

                            <li><a href="search.php">Recherche</a></li>
                            <!-- <li><a href="contact.php">Contactez-nous</a></li> -->
                            <?php
                            if (empty($_SESSION['Id_Utilisateur'])) {
                                echo'
                                    <li><a href="entreprise.php">Demande d\'inscription d\'une entreprise</a></li>
                                <li><a class="ticker-btn" href="login/inscription.php"><font color="#000000">Inscription</font></a></li>
                                <li><a class="ticker-btn" href="login/connexion.php"><font color="#000000">Se connecter</font></a></li>';
                            } else {
                                echo '
                                 <li class="menu-has-children"><a id="menu"> Bonjour   ' . $_SESSION['PNom_Utilisateur'] . ' ' . $_SESSION['Nom_Utilisateur'] . '</a>';
                                ?>
                                <ul>
                                    <?php
                                    if ($_SESSION['Id_Type'] == 4) {
                                        echo '<li><a href="profil.php">Mon profil</a></li>';
                                        echo' <li><a href="mes_offres.php?candidat='.$_SESSION['Id_Utilisateur'].'"> Voir mes offres </a></li> ';
                                    }

                                    if ($_SESSION['Id_Type'] == 1) {
                                        echo ' <li><a href="admin/examples/dashboard.php">Menue administration</a></li>';
                                    }
                                    ?>
                                    <li><a href="deco.php" id="deco" >Déconnexion</a></li>
                                </ul>
                                </li>
                            <?php } ?>


                        </ul>
                    </nav><!--#nav-menu-container -->		    		
                </div>
            </div>
        </header><!--#header -->

