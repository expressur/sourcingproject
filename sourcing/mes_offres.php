<!-- header -->
<?php
include 'header.php';
if (empty($_SESSION['Id_Utilisateur'])) {
    header('Location: index.php');
}
?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Les offres où j'ai postuler				
                </h1>	
                <p class="text-white link-nav"><a href="index.php">Accueil </a><span class="lnr lnr-arrow-right"></span> <a href="profil.php">Mon profil </a> <span class="lnr lnr-arrow-right"></span>  <a> Les offres où j'ai postuler</a></p>
            </div>											
        </div>
    </div>
</section>
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">

            <div class="col-lg-8 post-list">
                <?php
                $requete = $requete_offres;
                $resultat = $bdd->query($requete);
                while ($m_offres = $mes_offres->fetch()) { {
                        $requete_categorie = $requet_categorie_offre . ' ' . $m_offres[Id_Offre] . ')';

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
                                <a href="single.php?off=' . $m_offres[Id_Offre] . '"><h4>' . $m_offres[Titre_Offre] . '</h4></a>
                                     <h5> Nom de l\'entreprise : <b>'.$m_offres[NomEntreprise_Utilisateur].'</b></h5>
                                <h6> Type de contrat : ' . $m_offres[Type_OffreT] . '</h6>					
                            </div>
                            <ul>
                                
                                <li><a href="supp.php?candidat='.$id_user.'&off='.$m_offres[Id_Offre].'" class="genric-btn danger-border circle">Supprimer</a></li>
                            </ul>
                        </div>
                        <p>' . $m_offres[Petite_Description_Offre] . '</p>
                       
                        <p class="address"><span class="lnr lnr-map"></span> ' . $m_offres[Num_Adresse] . ' ' . $m_offres[Voie_Adresse] . ', ' . $m_offres[Dep_Adresse] . ' ' . $m_offres[Ville_Adresse] . '</p>
                        <p class="address"><span class="lnr lnr-database"></span> ' . $m_offres[Remuneration_Offre] . ' € ' . $m_offres[Remuneration_Type] . '</p>
                        <p class="address"> Date de debut : ' . $m_offres[Date_Debut_Offre] . '</p>
                        <p class="address"> Date de fin : ' . $m_offres[Date_Fin_Offre] . '</p>
                        
                    </div>
                </div>';
                    }
                }
                ?>											
            </div>
            <?php //include 'lateral.php';  ?>					
        </div>
    </div>
</div>	
</section>

<!-- start footer Area -->		
<?php include 'foot.php'; ?>
<!-- End footer Area -->

</body>
</html>
