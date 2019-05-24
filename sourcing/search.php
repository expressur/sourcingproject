<?php include 'header.php'?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row search-page-top d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    Recherche d'offre				
                </h1>
                <p class="text-white link-nav">
                    <a href="index.php">Acceuil </a> <span class="lnr lnr-arrow-right"></span> <a> Recherche d'offre</a>
                </p>	
                <form action="search.php" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-7 form-cols">
                            <input type="text" class="form-control" name="search" placeholder="Recherche par mot-clé">
                        </div>
                        <div class="col-lg-2 form-cols">
                            <button type="button" class="btn btn-info">
                                <span class="lnr"></span><font color="#000000">Recherche</font>
                            </button>
                        </div>								
                    </div>
                </form>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start post Area -->
<section id="ancre" id="ancre_postuler" class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">

            <div class="col-lg-8 post-list">
                <?php
                if (empty($_GET['lieu'])) {
                    $PAGE = 'search_empty';
                    include 'offres_list.php';
                } else {
                    if (empty($_SESSION['Id_Utilisateur'])) {
 $resultat = $bdd->query($requete);
                        while ($l_recherche = $lieu_recherche->fetch()) {
                            $requete_categorie = $requet_categorie_offre . ' ' . $l_recherche[Id_Offre] . ')';

                            $resultat_categories = $bdd->query($requete_categorie);
                            echo'<div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="img/job.png" alt="">
                        <ul class="tags">';
                            if ($requet_categorie_offre != NULL) {
                                while ($cat_offre = $resultat_categories->fetch()) {
                                    echo '<li>
                                    <a>' . $cat_offre[Nom_Categorie] . '</a>
                                </li>';
                                } // end while
                            } else {
                                echo '<li>
                                    <a>-VIDE-</a>
                                </li>';
                            }
                            echo' </ul>
                    </div>
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="single.php?off=' . $l_recherche[Id_Offre] . '"><h4>' . $l_recherche[Titre_Offre] . '</h4></a>
                                <h6> Type de contrat : ' . $l_recherche[Type_OffreT] . '</h6>					
                            </div>
                            <ul class="btns ">
                                
                                <li><a href="candidater.php?off=' . $l_recherche[Id_Offre] . '&candidat=' . $_SESSION['Id_Utilisateur'] . '">Postuler</a></li>
                            </ul>
                        </div>
                        <p>'
                            . $l_recherche[Petite_Description_Offre] .
                            '</p>
                       
                        <p class="address"><span class="lnr lnr-map"></span> ' . $l_recherche[Num_Adresse] . ' ' . $l_recherche[Voie_Adresse] . ', ' . $l_recherche[Dep_Adresse] . ' ' . $l_recherche[Ville_Adresse] . '</p>
                        <p class="address"><span class="lnr lnr-database"></span> ' . $l_recherche[Remuneration_Offre] . ' € ' . $l_recherche[Remuneration_Type] . '</p>
                        <p class="address"> Date de debut : ' . $l_recherche[Date_Debut_Offre] . '</p>                        
                        <p class="address"> Date de fin : ' . $l_recherche[Date_Fin_Offre] . '</p>
                    </div>
                </div>';
                        }
                    
                    } else {
                        $i = 0;
                        $resultat_postuler = $bdd->query($requete_candidat_postuler . $_SESSION['Id_Utilisateur']);
                        $tableau = array();
//secho $requete_candidat_postuler . $_SESSION["Id_Utilisateur"].'</br>';
                        while ($check_postuler = $resultat_postuler->fetch()) {
                            //echo $check_postuler[Id_Offre].'</br>';
                            $tableau[$i] = $check_postuler[Id_Offre];
                            $i ++;
                        }
                        $resultat = $bdd->query($requete);
                        while ($l_recherche = $lieu_recherche->fetch()) {
                            $requete_categorie = $requet_categorie_offre . ' ' . $l_recherche[Id_Offre] . ')';

                            $resultat_categories = $bdd->query($requete_categorie);
                            echo'<div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="img/job.png" alt="">
                        <ul class="tags">';
                            if ($requet_categorie_offre != NULL) {
                                while ($cat_offre = $resultat_categories->fetch()) {
                                    echo '<li>
                                    <a>' . $cat_offre[Nom_Categorie] . '</a>
                                </li>';
                                } // end while
                            } else {
                                echo '<li>
                                    <a>-VIDE-</a>
                                </li>';
                            }
                            echo' </ul>
                    </div>
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="single.php?off=' . $l_recherche[Id_Offre] . '"><h4>' . $l_recherche[Titre_Offre] . '</h4></a>
                                <h6> Type de contrat : ' . $l_recherche[Type_OffreT] . '</h6>					
                            </div>
                              <div class="title text-center">
                           
                            <ul class="btns ">';
                            $trouver = FALSE;

                            for ($i = 0; $i < count($tableau); $i++) {

                                if ($l_recherche[Id_Offre] == $tableau[$i]) {
                                    $trouver = TRUE;

                                    break;
                                }
                            }

                            if ($trouver) {
                               echo '<button id="postuler" type="submit" class="genric-btn disable" >A Déjà postuler</button>';
                            } else
                                echo' <li><a href="candidater.php?off=' . $l_recherche[Id_Offre] . '&candidat=' . $_SESSION['Id_Utilisateur'] . '">Postuler</a></li>';
                            echo' </ul>
                            </div>
                        </div>
                        <p>' . $l_recherche[Petite_Description_Offre] . '</p>
                       
                        <p class="address"><span class="lnr lnr-map"></span> ' . $l_recherche[Num_Adresse] . ' ' . $l_recherche[Voie_Adresse] . ', ' . $l_recherche[Dep_Adresse] . ' ' . $l_recherche[Ville_Adresse] . '</p>
                        <p class="address"><span class="lnr lnr-database"></span> ' . $l_recherche[Remuneration_Offre] . ' € ' . $l_recherche[Remuneration_Type] . '</p>
                        <p class="address"> Date de debut : ' . $l_recherche[Date_Debut_Offre] . '</p>
                        <p class="address"> Date de fin : ' . $l_recherche[Date_Fin_Offre] . '</p>
                        
                    </div>
                </div>';
                        }
                    }
                }
                ?>											
            </div>
                <?php include 'lateral.php'; ?>					
        </div>
    </div>
</div>	
</section>
<!-- End post Area -->
                <?php include 'foot.php'; ?>		

</body>
</html>