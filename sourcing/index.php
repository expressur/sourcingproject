<!-- header -->
<?php
include 'header.php';
?>

<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    <span><?php echo $nb_offre['0']; ?></span> offres au total sur notre site!				
                </h1>	
                <form action="search.php" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-4 form-cols">
                            <input type="text" class="form-control" name="search" placeholder="Recherche par mot-clé">
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects"">
                                <select>
                                    <option value="1">Séléctionnez un endroit</option>
                                    <?php
                                    for ($i = 2; $i < 6; $i++) {
                                        while ($l_offre = $lieu_offre->fetch()) {
                                            echo'<option value="' . $i++ . '">' . $l_offre[Ville_Adresse] . '</option>';
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select>
                                    <option value="1">Les catégories</option>
                                    <option value="2">Medical</option>
                                    <option value="3">Technology</option>
                                    <option value="4">Goverment</option>
                                    <option value="5">Development</option>
                                </select>
                            </div>										
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

<!-- Start features Area -->
<section class="features-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Recherche</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Appliquer</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Sécurité</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Notifications</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </p>
                </div>
            </div>																		
        </div>
    </div>	
</section>
<!-- End features Area -->



<!-- Start post Area -->
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">

            <div class="col-lg-8 post-list">
                <?php
                for ($y = 0; $y < 2; $y++) {
                    while ($offres = $les_offres->fetch()) {

                        echo'<div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="img/post.png" alt="">
                        <ul class="tags">
                            <li>
                                <a href="#">Art</a>
                            </li>
                            <li>
                                <a href="#">Media</a>
                            </li>
                            <li>
                                <a href="#">Design</a>					
                            </li>
                        </ul>
                    </div>
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="single.php?off=' . $offres[Id_Offre] . '"><h4>' . $offres[Titre_Offre] . '</h4></a>
                                <h6> Type de contrat : ' . $offres[Type_OffreT] . '</h6>					
                            </div>
                              <div class="title text-center">
                           
                            <ul class="btns ">
                                <li><a href="candidater.php?off='.$offres[Id_Offre].'&candidat='.$_SESSION['Id_Utilisateur'].'">Candidater</a></li>
                            
                            </ul>
                            </div>
                        </div>
                        <p>'
                        . $offres[Petite_Description_Offre] .
                        '</p>
                       
                        <p class="address"><span class="lnr lnr-map"></span> ' . $offres[Num_Adresse] . ' ' . $offres[Voie_Adresse] . ', ' . $offres[Dep_Adresse] . ' ' . $offres[Ville_Adresse] . '</p>
                        <p class="address"><span class="lnr lnr-database"></span> ' . $offres[Remuneration_Offre] . ' € '. $offres[Remuneration_Type].'</p>
                        <p class="address"> Date de fin : ' . $offres[Date_Fin_Offre] . '</p>
                        <p class="address"> Date de debut : ' . $offres[Date_Debut_Offre] . '</p>
                    </div>
                </div>';
                    }
                }
                ?>											
                <a class="text-uppercase loadmore-btn mx-auto d-block" href="search.php"><font color="#000000">Voir plus de job</font></a>
            </div>
            <?php include 'lateral.php'; ?>
        </div>
    </div>	
</section>
<!-- End post Area -->


<?php include 'foot.php'; ?>
<!-- End footer Area -->		


</body>
</php>
